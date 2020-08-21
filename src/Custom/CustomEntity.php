<?php declare(strict_types=1);

namespace Swag\CustomEntityTranslations\Custom;

use Swag\CustomEntityTranslations\Custom\Aggregate\CustomTranslation\CustomEntityTranslationCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class CustomEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $technicalName;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var CustomEntityTranslationCollection|null
     */
    protected $translations;

    public function getTechnicalName(): string
    {
        return $this->technicalName;
    }

    public function setTechnicalName(string $technicalName): void
    {
        $this->technicalName = $technicalName;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getTranslations(): ?CustomEntityTranslationCollection
    {
        return $this->translations;
    }

    public function setTranslations(CustomEntityTranslationCollection $translations): void
    {
        $this->translations = $translations;
    }
}
