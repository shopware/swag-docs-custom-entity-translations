<?php declare(strict_types=1);

namespace CustomEntityTranslations\Custom;

use CustomEntityTranslations\Custom\Aggregate\CustomTranslation\CustomEntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\UpdatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class CustomEntityDefinition extends EntityDefinition
{
    public static function getEntityName(): string
    {
        return 'custom_entity';
    }

    public static function getCollectionClass(): string
    {
        return CustomEntityCollection::class;
    }

    public static function getEntityClass(): string
    {
        return CustomEntity::class;
    }

    protected static function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            new StringField('technical_name', 'technicalName'),
            new TranslatedField('label'),
            new CreatedAtField(),
            new UpdatedAtField(),
            (new TranslationsAssociationField(CustomEntityTranslationDefinition::class, 'custom_entity_id'))->addFlags(new Required()),
        ]);
    }
}