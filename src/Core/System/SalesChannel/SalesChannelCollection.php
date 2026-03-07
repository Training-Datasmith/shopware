<?php declare(strict_types=1);

namespace Shopware\Core\System\SalesChannel;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\System\Currency\CurrencyCollection;
use Shopware\Core\System\Language\LanguageCollection;
use Shopware\Core\System\SalesChannel\Aggregate\SalesChannelType\SalesChannelTypeCollection;

/**
 * @extends EntityCollection<SalesChannelEntity>
 */
#[Package('discovery')]
class SalesChannelCollection extends EntityCollection
{
    /**
     * @return array<string>
     */
    public function getLanguageIds(): array
    {
        return $this->fmap(fn (SalesChannelEntity $salesChannel): string => $salesChannel->getLanguageId());
    }

    public function filterByLanguageId(string $id): SalesChannelCollection
    {
        return $this->filter(fn (SalesChannelEntity $salesChannel): bool => $salesChannel->getLanguageId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getCurrencyIds(): array
    {
        return $this->fmap(fn (SalesChannelEntity $salesChannel): string => $salesChannel->getCurrencyId());
    }

    public function filterByCurrencyId(string $id): SalesChannelCollection
    {
        return $this->filter(fn (SalesChannelEntity $salesChannel): bool => $salesChannel->getCurrencyId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getPaymentMethodIds(): array
    {
        return $this->fmap(fn (SalesChannelEntity $salesChannel): string => $salesChannel->getPaymentMethodId());
    }

    public function filterByPaymentMethodId(string $id): SalesChannelCollection
    {
        return $this->filter(fn (SalesChannelEntity $salesChannel): bool => $salesChannel->getPaymentMethodId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getShippingMethodIds(): array
    {
        return $this->fmap(fn (SalesChannelEntity $salesChannel): string => $salesChannel->getShippingMethodId());
    }

    public function filterByShippingMethodId(string $id): SalesChannelCollection
    {
        return $this->filter(fn (SalesChannelEntity $salesChannel): bool => $salesChannel->getShippingMethodId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getCountryIds(): array
    {
        return $this->fmap(fn (SalesChannelEntity $salesChannel): string => $salesChannel->getCountryId());
    }

    public function filterByCountryId(string $id): SalesChannelCollection
    {
        return $this->filter(fn (SalesChannelEntity $salesChannel): bool => $salesChannel->getCountryId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getTypeIds(): array
    {
        return $this->fmap(fn (SalesChannelEntity $salesChannel): string => $salesChannel->getTypeId());
    }

    public function filterByTypeId(string $id): SalesChannelCollection
    {
        return $this->filter(fn (SalesChannelEntity $salesChannel): bool => $salesChannel->getTypeId() === $id);
    }

    public function getLanguages(): LanguageCollection
    {
        return new LanguageCollection(
            $this->fmap(fn (SalesChannelEntity $salesChannel): ?\Shopware\Core\System\Language\LanguageEntity => $salesChannel->getLanguage())
        );
    }

    public function getCurrencies(): CurrencyCollection
    {
        return new CurrencyCollection(
            $this->fmap(fn (SalesChannelEntity $salesChannel): ?\Shopware\Core\System\Currency\CurrencyEntity => $salesChannel->getCurrency())
        );
    }

    public function getTypes(): SalesChannelTypeCollection
    {
        return new SalesChannelTypeCollection(
            $this->fmap(fn (SalesChannelEntity $salesChannel): ?\Shopware\Core\System\SalesChannel\Aggregate\SalesChannelType\SalesChannelTypeEntity => $salesChannel->getType())
        );
    }

    public function getApiAlias(): string
    {
        return 'sales_channel_collection';
    }

    protected function getExpectedClass(): string
    {
        return SalesChannelEntity::class;
    }
}
