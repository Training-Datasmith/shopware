<?php

declare(strict_types=1);

use function PHPStan\Testing\assertType;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

$collection = new EntityCollection(['foo' => new Entity()]);

if ($collection->has('foo')) {
    assertType(Entity::class, $collection->get('foo'));
    assertType(Entity::class . '|null', $collection->get('bar'));
} else {
    assertType('null', $collection->get('foo'));
    assertType(Entity::class . '|null', $collection->get('bar'));
}
