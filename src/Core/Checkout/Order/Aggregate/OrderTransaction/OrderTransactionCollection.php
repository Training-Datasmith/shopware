<?php

declare(strict_types=1);

namespace Shopware\Core\Checkout\Order\Aggregate\OrderTransaction;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;

/**
 * @extends EntityCollection<OrderTransactionEntity>
 */
#[Package('checkout')]
class OrderTransactionCollection extends EntityCollection
{
    public function filterByState(string $state): self
    {
        return $this->filter(fn (OrderTransactionEntity $transaction): bool => $transaction->getStateMachineState()?->getTechnicalName() === $state);
    }

    public function filterByStateId(string $stateId): self
    {
        return $this->filter(fn (OrderTransactionEntity $transaction): bool => $transaction->getStateId() === $stateId);
    }

    /**
     * @return array<string>
     */
    public function getOrderIds(): array
    {
        return $this->fmap(fn (OrderTransactionEntity $orderTransaction): string => $orderTransaction->getOrderId());
    }

    public function filterByOrderId(string $id): self
    {
        return $this->filter(fn (OrderTransactionEntity $orderTransaction): bool => $orderTransaction->getOrderId() === $id);
    }

    /**
     * @return array<string>
     */
    public function getPaymentMethodIds(): array
    {
        return $this->fmap(fn (OrderTransactionEntity $orderTransaction): string => $orderTransaction->getPaymentMethodId());
    }

    public function filterByPaymentMethodId(string $id): self
    {
        return $this->filter(fn (OrderTransactionEntity $orderTransaction): bool => $orderTransaction->getPaymentMethodId() === $id);
    }

    public function getApiAlias(): string
    {
        return 'order_transaction_collection';
    }

    protected function getExpectedClass(): string
    {
        return OrderTransactionEntity::class;
    }
}
