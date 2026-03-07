<?php

declare(strict_types=1);

namespace Shopware\Core\Framework\DataAbstractionLayer\Field;

use Shopware\Core\Framework\DataAbstractionLayer\FieldSerializer\VariantListingConfigFieldSerializer;
use Shopware\Core\Framework\Log\Package;

#[Package('framework')]
class VariantListingConfigField extends JsonField
{
    protected function getSerializerClass(): string
    {
        return VariantListingConfigFieldSerializer::class;
    }
}
