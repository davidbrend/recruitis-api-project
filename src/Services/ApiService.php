<?php

namespace Davebrend\RecruitisApiProject\Services;


use Davebrend\RecruitisApiProject\Clients\Client;
use Davebrend\RecruitisApiProject\Exceptions\RecruitisApiException;
use Psr\Http\Message\ResponseInterface;

class ApiService
{
    protected const RECRUITIS_API_V2_URL = 'https://app.recruitis.io/api2';

    public function __construct(protected Client $client)
    {
    }

    /**
     * @param array<string, mixed> $queryParams
     * @return mixed[]
     * @throws RecruitisApiException
     * @throws \JsonException
     */
    public function getJobsDataPayload(array $queryParams = []): array
    {
        $response = $this->client->setMethod(Client::REQUEST_GET_METHOD)
            ->setUrl(self::RECRUITIS_API_V2_URL . '/jobs')
            ->setQueryParams($queryParams)
            ->doRequest();
        return $this->getDataPayloadFromResponse($response);
    }

    /**
     * @param ResponseInterface $response
     * @return array<mixed>
     * @throws \JsonException
     * @throws RecruitisApiException
     */
    protected function getDataPayloadFromResponse(ResponseInterface $response): array
    {
        $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        if (count($data) === 0) {
            throw new RecruitisApiException('Invalid data');
        }

        if (!isset($data['meta'])) {
            throw new RecruitisApiException('Invalid meta data in response');
        }

        if (isset($data['code']) && str_contains($data['code'], 'api.error')) {
            throw new RecruitisApiException($data['code'] . isset($data['message']) ? ': ' . $data['message'] : '');
        }

        if (!isset($data['payload']) || !is_array($data['payload'])) {
            throw new RecruitisApiException('Invalid payload data');
        }

        return $data['payload'];
    }

}