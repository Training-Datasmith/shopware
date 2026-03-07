<?php

declare(strict_types=1);

namespace Shopware\Core\Checkout\Order;

use Shopware\Core\Checkout\Order\Aggregate\OrderAddress\OrderAddressCollection;
use Shopware\Core\Checkout\Order\Aggregate\OrderCustomer\OrderCustomerCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\System\Currency\CurrencyCollection;
use Shopware\Core\System\SalesChannel\SalesChannelCollection;

/**
 * @extends EntityCollection<OrderEntity>
 */
#[Package('checkout')]
class OrderCollection extends EntityCollection
{
    /**
     * @return array<string>
     */
    public function getCurrencyIds(): array
    {
        return $this->fmap(fn (OrderEntity $order): string => $order->getCurrencyId());
    }

    public function filterByCurrencyId(string $id): self
    {
        return $this->filter(fn (OrderEntity $order): bool => $order->getCurrencyId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getSalesChannelIs(): array
    {
        return $this->fmap(fn (OrderEntity $order): string => $order->getSalesChannelId());
    }

    public function filterBySalesChannelId(string $id): self
    {
        return $this->filter(fn (OrderEntity $order): bool => $order->getSalesChannelId() === $id);
    }

    public function getOrderCustomers(): OrderCustomerCollection
    {
        return new OrderCustomerCollection(
            $this->fmap(fn (OrderEntity $order): ?\Shopware\Core\Checkout\Order\Aggregate\OrderCustomer\OrderCustomerEntity => $order->getOrderCustomer())
        );
    }

    public function getCurrencies(): CurrencyCollection
    {
        return new CurrencyCollection(
            $this->fmap(fn (OrderEntity $order): ?\Shopware\Core\System\Currency\CurrencyEntity => $order->getCurrency())
        );
    }

    public function getSalesChannels(): SalesChannelCollection
    {
        return new SalesChannelCollection(
            $this->fmap(fn (OrderEntity $order): ?\Shopware\Core\System\SalesChannel\SalesChannelEntity => $order->getSalesChannel())
        );
    }

    public function getBillingAddress(): OrderAddressCollection
    {
        return new OrderAddressCollection(
            $this->flatMap(fn (OrderEntity $order): ?\Shopware\Core\Checkout\Order\Aggregate\OrderAddress\OrderAddressCollection => $order->getAddresses())
        );
    }

    public function getApiAlias(): string
    {
        return 'order_collection';
    }

    protected function getExpectedClass(): string
    {
        return OrderEntity::class;
    }
}
