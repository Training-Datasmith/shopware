<?php

declare(strict_types=1);

namespace Shopware\Core\Framework\DataAbstractionLayer\Field;

use Shopware\Core\Framework\DataAbstractionLayer\FieldSerializer\PriceDefinitionFieldSerializer;
use Shopware\Core\Framework\Log\Package;

#[Package('framework')]
class PriceDefinitionField extends JsonField
{
    protected function getSerializerClass(): string
    {
        return PriceDefinitionFieldSerializer::class;
    }
}
