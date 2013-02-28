<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 28/02/13 15:22
 */

namespace JordiLlonch\Bundle\WebScrapperBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class SourcesCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('jordi_llonch.webscrapper.extractor')) {
            return;
        }

        $definition = $container->getDefinition('jordi_llonch.webscrapper.extractor');

        foreach ($container->findTaggedServiceIds('jordi_llonch.webscrapper.source') as $id => $attributes) {
            $definition->addMethodCall('setSource', array(new Reference($id)));
        }
    }
}