<?php declare(strict_types = 1);

namespace CustomEntityTranslations\Custom\Aggregate\CustomTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class CustomEntityTranslationCollection extends EntityCollection
{
    public function getCustomEntityIds(): array
    {
        return $this->fmap(function (CustomTranslationEntity $customTranslationEntity) {
            return $customTranslationEntity->getCustomEntityId();
        });
    }

    public function filterByCustomEntityId(string $id): self
    {
        return $this->filter(function (CustomTranslationEntity $customTranslationEntity) use ($id) {
            return $customTranslationEntity->getCustomEntityId() === $id;
        });
    }

    public function getLanguageIds(): array
    {
        return $this->fmap(function (CustomTranslationEntity $customTranslationEntity) {
            return $customTranslationEntity->getLanguageId();
        });
    }

    public function filterByLanguageId(string $id): self
    {
        return $this->filter(function (CustomTranslationEntity $customTranslationEntity) use ($id) {
            return $customTranslationEntity->getLanguageId() === $id;
        });
    }

    protected function getExpectedClass(): string
    {
        return CustomTranslationEntity::class;
    }
}