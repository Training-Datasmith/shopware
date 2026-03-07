<?php

declare(strict_types=1);

namespace Shopware\Core\Content\Cookie\Struct;

use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Struct\Struct;

/**
 * @codeCoverageIgnore
 *
 * Name and description can be provided as snippet keys or directly translated text.
 */
#[Package('framework')]
class CookieEntry extends Struct
{
    public ?string $value = null;

    public ?int $expiration = null;

    public ?string $name = null;

    public ?string $description = null;

    public bool $hidden = false;

    public function __construct(
        public string $cookie,
    ) {
    }

    public function getApiAlias(): string
    {
        return 'cookie_entry';
    }
}
