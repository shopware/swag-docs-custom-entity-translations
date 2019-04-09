<?php declare(strict_types = 1);

namespace Swag\CustomEntityTranslations\Custom\Aggregate\CustomTranslation;

use Swag\CustomEntity\Custom\CustomEntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class CustomEntityTranslationDefinition extends EntityTranslationDefinition
{
    public static function getEntityName(): string
    {
        return 'custom_entity_translation';
    }

    public static function getCollectionClass(): string
    {
        return CustomEntityTranslationCollection::class;
    }

    public static function getEntityClass(): string
    {
        return CustomTranslationEntity::class;
    }

    public static function getParentDefinitionClass(): string
    {
        return CustomEntityDefinition::class;
    }

    protected static function defineFields(): FieldCollection
    {
        return new FieldCollection([
            new StringField('label', 'label'),
        ]);
    }
}