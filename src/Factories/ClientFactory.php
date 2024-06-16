<?php

namespace Davebrend\RecruitisApiProject\Factories;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class ClientFactory
{
    public function __construct(protected ?string $apiToken = null)
    {
    }

    public function createClient(): ClientInterface
    {
        $config = [];
        if ($this->apiToken) {
            $config['headers'] = [
                'Authorization' => 'Bearer ' . $this->apiToken,
            ];
        }

        return new Client($config);
    }
}