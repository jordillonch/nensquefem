<?php

namespace JordiLlonch\Bundle\WebScrapperBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use JordiLlonch\Bundle\WebScrapperBundle\DependencyInjection\Compiler\SourcesCompilerPass;

class JordiLlonchWebScrapperBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new SourcesCompilerPass());
    }
}
