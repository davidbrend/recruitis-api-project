<?php

namespace App\Tests\DI;

use Davebrend\RecruitisApiProject\DI\RecruitisApiConfig;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class RecruitisApiConfigTest extends TestCase
{
    public function testGetConfigTreeBuilder(): void
    {
        $config = new RecruitisApiConfig();
        $treeBuilder = $config->getConfigTreeBuilder();

        $this->assertInstanceOf(TreeBuilder::class, $treeBuilder);
    }
}