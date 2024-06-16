<?php

namespace Davebrend\RecruitisApiProject\Services;


use Davebrend\RecruitisApiProject\Client\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ApiService
{
    protected const RECRUITIS_API_V2_URL = 'https://app.recruitis.io/api2';

    public function __construct(protected Client $client)
    {
    }

    /**
     * @param array<string, mixed> $queryParams
     * @return array<mixed>
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function getJobsData(array $queryParams = []): array
    {
        $response = $this->client->setMethod(Client::REQUEST_GET_METHOD)
            ->setUrl(self::RECRUITIS_API_V2_URL . '/jobs')
            ->setQueryParams($queryParams)
            ->doRequest();

        return $this->getDataFromResponse($response);
    }

    /**
     * @param ResponseInterface $response
     * @return array<mixed>
     * @throws \JsonException
     */
    protected function getDataFromResponse(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

}