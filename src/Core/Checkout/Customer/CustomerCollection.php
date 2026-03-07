<?php declare(strict_types=1);

namespace Shopware\Core\Checkout\Customer;

use Shopware\Core\Checkout\Customer\Aggregate\CustomerAddress\CustomerAddressCollection;
use Shopware\Core\Checkout\Customer\Aggregate\CustomerGroup\CustomerGroupCollection;
use Shopware\Core\Checkout\Payment\PaymentMethodCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\System\SalesChannel\SalesChannelCollection;

/**
 * @extends EntityCollection<CustomerEntity>
 */
#[Package('checkout')]
class CustomerCollection extends EntityCollection
{
    /**
     * @return array<string>
     */
    public function getGroupIds(): array
    {
        return $this->fmap(fn (CustomerEntity $customer): string => $customer->getGroupId());
    }

    public function filterByGroupId(string $id): self
    {
        return $this->filter(fn (CustomerEntity $customer): bool => $customer->getGroupId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getSalesChannelIds(): array
    {
        return $this->fmap(fn (CustomerEntity $customer): string => $customer->getSalesChannelId());
    }

    public function filterBySalesChannelId(string $id): self
    {
        return $this->filter(fn (CustomerEntity $customer): bool => $customer->getSalesChannelId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getLanguageIds(): array
    {
        return $this->fmap(fn (CustomerEntity $customer): string => $customer->getLanguageId());
    }

    /**
     * @return array<string>
     */
    public function getLastPaymentMethodIds(): array
    {
        return $this->fmap(fn (CustomerEntity $customer): ?string => $customer->getLastPaymentMethodId());
    }

    public function filterByLastPaymentMethodId(string $id): self
    {
        return $this->filter(fn (CustomerEntity $customer): bool => $customer->getLastPaymentMethodId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getDefaultBillingAddressIds(): array
    {
        return $this->fmap(fn (CustomerEntity $customer): string => $customer->getDefaultBillingAddressId());
    }

    public function filterByDefaultBillingAddressId(string $id): self
    {
        return $this->filter(fn (CustomerEntity $customer): bool => $customer->getDefaultBillingAddressId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getDefaultShippingAddressIds(): array
    {
        return $this->fmap(fn (CustomerEntity $customer): string => $customer->getDefaultShippingAddressId());
    }

    public function filterByDefaultShippingAddressId(string $id): self
    {
        return $this->filter(fn (CustomerEntity $customer): bool => $customer->getDefaultShippingAddressId() === $id);
    }

    public function getGroups(): CustomerGroupCollection
    {
        return new CustomerGroupCollection(
            $this->fmap(fn (CustomerEntity $customer): ?\Shopware\Core\Checkout\Customer\Aggregate\CustomerGroup\CustomerGroupEntity => $customer->getGroup())
        );
    }

    public function getSalesChannels(): SalesChannelCollection
    {
        return new SalesChannelCollection(
            $this->fmap(fn (CustomerEntity $customer): ?\Shopware\Core\System\SalesChannel\SalesChannelEntity => $customer->getSalesChannel())
        );
    }

    public function getLastPaymentMethods(): PaymentMethodCollection
    {
        return new PaymentMethodCollection(
            $this->fmap(fn (CustomerEntity $customer): ?\Shopware\Core\Checkout\Payment\PaymentMethodEntity => $customer->getLastPaymentMethod())
        );
    }

    public function getDefaultBillingAddress(): CustomerAddressCollection
    {
        return new CustomerAddressCollection(
            $this->fmap(fn (CustomerEntity $customer): ?\Shopware\Core\Checkout\Customer\Aggregate\CustomerAddress\CustomerAddressEntity => $customer->getDefaultBillingAddress())
        );
    }

    public function getDefaultShippingAddress(): CustomerAddressCollection
    {
        return new CustomerAddressCollection(
            $this->fmap(fn (CustomerEntity $customer): ?\Shopware\Core\Checkout\Customer\Aggregate\CustomerAddress\CustomerAddressEntity => $customer->getDefaultShippingAddress())
        );
    }

    /**
     * @return array<array<string>>
     */
    public function getListVatIds(): array
    {
        return $this->fmap(fn (CustomerEntity $customer): ?array => $customer->getVatIds());
    }

    public function filterByVatId(string $id): self
    {
        return $this->filter(fn (CustomerEntity $customer): bool => \in_array($id, $customer->getVatIds() ?? [], true));
    }

    public function getApiAlias(): string
    {
        return 'customer_collection';
    }

    protected function getExpectedClass(): string
    {
        return CustomerEntity::class;
    }
}
