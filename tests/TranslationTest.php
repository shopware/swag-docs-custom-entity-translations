<?php declare(strict_types=1);

namespace Swag\CustomEntityTranslationsTests;

use PHPUnit\Framework\TestCase;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\MultiFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\NotFilter;
use Shopware\Core\Framework\Test\TestCaseBase\IntegrationTestBehaviour;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\System\SalesChannel\Context\SalesChannelContextFactory;

class TranslationTest extends TestCase
{
    use IntegrationTestBehaviour;

    public function test_translations()
    {
        /** @var SalesChannelContextFactory $contextFactory */
        $contextFactory = $this->getContainer()->get(SalesChannelContextFactory::class);
        $context = $contextFactory->create(Uuid::randomHex(), Defaults::SALES_CHANNEL)->getContext();

        $customEntityRepository = $this->getCustomEntityRepository();
        $secondLanguageId = $this->getSecondLanguageId($context);

        $expected = 'this is a simple test';
        $customEntityRepository->upsert(
            [
                [
                    'label' => 'New Label',
                    'translations' => [
                        ['label' => $expected, 'languageId' => $secondLanguageId],
                    ],
                ],
            ],
            $context
        );

        $result = $customEntityRepository->search(
            (new Criteria())->addAssociation('translations'),
            $context
        )->first();

        $customEntityTranslation = $result->getTranslations()->filterByLanguageId($secondLanguageId)->first();

        static::assertEquals($expected, $customEntityTranslation->getLabel());
    }

    private function getSecondLanguageId(Context $context): ?string
    {
        /** @var EntityRepositoryInterface $languageRepository */
        $languageRepository = $this->getContainer()->get('language.repository');
        return $languageRepository->searchIds(
            (new Criteria())->addFilter(new NotFilter(MultiFilter::CONNECTION_AND, [new EqualsFilter('id', $context->getLanguageId())])),
            $context
        )->firstId();
    }

    private function getCustomEntityRepository(): EntityRepositoryInterface
    {
        $repository = $this->getContainer()->get('custom_entity.repository');

        if (!$repository instanceof EntityRepositoryInterface) {
            throw new \RuntimeException('Entity repository "custom_entity.repository" not found');
        }

        return $repository;
    }
}
