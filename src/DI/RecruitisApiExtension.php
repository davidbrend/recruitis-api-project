<?php

namespace Davebrend\RecruitisApiProject\DI;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class RecruitisApiExtension extends Extension
{
    /**
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new RecruitisApiConfig();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('recruitis_api.api_token', $config['api_token']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Configs'));
        $loader->load('services.yaml');
    }
}