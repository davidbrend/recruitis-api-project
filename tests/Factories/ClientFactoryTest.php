<?php

namespace App\Tests\Factories;

use Davebrend\RecruitisApiProject\Factories\ClientFactory;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;

class ClientFactoryTest extends TestCase
{
    public function testCreateClientWithoutApiToken(): void
    {
        $factory = new ClientFactory();
        $client = $factory->createClient();

        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    public function testCreateClientWithApiToken(): void
    {
        $factory = new ClientFactory('test-token');
        $client = $factory->createClient();

        $this->assertInstanceOf(ClientInterface::class, $client);
    }
}
