<?php

namespace Davebrend\RecruitisApiProject\Clients;

use Davebrend\RecruitisApiProject\Exceptions\RequestException;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private string $method;
    private string $url;
    /** @var array<int|string> $queryParams */
    private array $queryParams = [];

    public const REQUEST_GET_METHOD = 'GET';

    public function __construct(protected ClientInterface $client)
    {
    }

    /**
     * @throws RequestException
     */
    public function doRequest(): ResponseInterface
    {
        try {
            return $this->client->request($this->method, $this->buildUrl());
        } catch (\Throwable $e) {
            throw new RequestException('Error making request to Recruitis API', $e->getCode());
        }
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array<string|int>
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * @param array<string|int> $queryParams
     * @return $this
     */
    public function setQueryParams(array $queryParams): self
    {
        $this->queryParams = $queryParams;
        return $this;
    }

    private function buildUrl(): string
    {
        if (count($this->queryParams) === 0) {
            return $this->url;
        }

        return $this->url . '?' . http_build_query($this->queryParams);
    }
}