<?php

namespace Davebrend\RecruitisApiProject\DI;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class RecruitisApiConfig implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('recruitis_api');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('api_token')->defaultNull()->end()
            ->end();

        return $treeBuilder;
    }
}