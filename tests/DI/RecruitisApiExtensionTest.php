<?php

namespace App\Tests\DI;

use Davebrend\RecruitisApiProject\DI\RecruitisApiExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RecruitisApiExtensionTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testLoad(): void
    {
        $configs = [['api_token' => 'test-token']];
        $container = new ContainerBuilder();
        $extension = new RecruitisApiExtension();

        $extension->load($configs, $container);

        $this->assertEquals('test-token', $container->getParameter('recruitis_api.api_token'));
    }
}