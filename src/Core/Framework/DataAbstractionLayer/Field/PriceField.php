<?php declare(strict_types=1);

namespace Shopware\Core\Framework\DataAbstractionLayer\Field;

use Shopware\Core\Framework\DataAbstractionLayer\Dbal\FieldAccessorBuilder\PriceFieldAccessorBuilder;
use Shopware\Core\Framework\DataAbstractionLayer\FieldSerializer\PriceFieldSerializer;
use Shopware\Core\Framework\Log\Package;

#[Package('framework')]
class PriceField extends JsonField
{
    protected function getSerializerClass(): string
    {
        return PriceFieldSerializer::class;
    }

    protected function getAccessorBuilderClass(): ?string
    {
        return PriceFieldAccessorBuilder::class;
    }
}
