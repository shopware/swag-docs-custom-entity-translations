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
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

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

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
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