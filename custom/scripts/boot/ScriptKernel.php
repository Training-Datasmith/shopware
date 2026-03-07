<?php

declare(strict_types=1);

namespace Scripts\Boot;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class ScriptKernel extends \Shopware\Core\Kernel
{
    protected function build(ContainerBuilder $container): void
    {
        foreach ($container->getDefinitions() as $id => $definition) {
            if ($definition->isAbstract()) {
                continue;
            }
            $definition->setPublic(true);
        }
    }
}
