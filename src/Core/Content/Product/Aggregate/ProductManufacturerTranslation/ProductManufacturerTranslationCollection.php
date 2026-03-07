<?php

declare(strict_types=1);

namespace Shopware\Core\Content\Product\Aggregate\ProductManufacturerTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;

/**
 * @extends EntityCollection<ProductManufacturerTranslationEntity>
 */
#[Package('inventory')]
class ProductManufacturerTranslationCollection extends EntityCollection
{
    /**
     * @return array<string>
     */
    public function getProductManufacturerIds(): array
    {
        return $this->fmap(fn (ProductManufacturerTranslationEntity $productManufacturerTranslation): string => $productManufacturerTranslation->getProductManufacturerId());
    }

    public function filterByProductManufacturerId(string $id): self
    {
        return $this->filter(fn (ProductManufacturerTranslationEntity $productManufacturerTranslation): bool => $productManufacturerTranslation->getProductManufacturerId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getLanguageIds(): array
    {
        return $this->fmap(fn (ProductManufacturerTranslationEntity $productManufacturerTranslation): string => $productManufacturerTranslation->getLanguageId());
    }

    public function filterByLanguageId(string $id): self
    {
        return $this->filter(fn (ProductManufacturerTranslationEntity $productManufacturerTranslation): bool => $productManufacturerTranslation->getLanguageId() === $id);
    }

    public function getApiAlias(): string
    {
        return 'product_manufacturer_translation_collection';
    }

    protected function getExpectedClass(): string
    {
        return ProductManufacturerTranslationEntity::class;
    }
}
