<?php declare(strict_types = 1);

namespace Swag\CustomEntityTranslations\Custom\Aggregate\CustomTranslation;

use Swag\CustomEntityTranslations\Custom\CustomEntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class CustomEntityTranslationDefinition extends EntityTranslationDefinition
{
    public function getEntityName(): string
    {
        return 'swag_custom_entity_translation';
    }

    public function getCollectionClass(): string
    {
        return CustomEntityTranslationCollection::class;
    }

    public function getEntityClass(): string
    {
        return CustomTranslationEntity::class;
    }

    public function getParentDefinitionClass(): string
    {
        return CustomEntityDefinition::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            new StringField('label', 'label'),
        ]);
    }
}
