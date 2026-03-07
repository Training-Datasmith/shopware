<?php

declare(strict_types=1);

namespace Shopware\Core\Framework\Adapter\Messenger\Stamp;

use Shopware\Core\Framework\Log\Package;
use Symfony\Component\Messenger\Stamp\StampInterface;

#[Package('framework')]
readonly class SentAtStamp implements StampInterface
{
    public function __construct(private ?\DateTimeInterface $sentAt = new \DateTimeImmutable())
    {
    }

    public function getSentAt(): \DateTimeInterface
    {
        return $this->sentAt;
    }
}
