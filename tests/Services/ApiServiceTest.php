<?php

namespace Tests\Services;

use Davebrend\RecruitisApiProject\Clients\Client;
use Davebrend\RecruitisApiProject\Exceptions\RecruitisApiException;
use Davebrend\RecruitisApiProject\Services\ApiService;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ApiServiceTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws \JsonException
     * @throws RecruitisApiException
     */
    public function testGetJobsData(): void
    {
        $client = $this->createMock(Client::class);
        $response = $this->createMock(ResponseInterface::class);
        $stream = $this->createMock(StreamInterface::class);

        $client->expects($this->once())
            ->method('setMethod')
            ->with(Client::REQUEST_GET_METHOD)
            ->willReturnSelf();

        $client->expects($this->once())
            ->method('setUrl')
            ->with('https://app.recruitis.io/api2/jobs')
            ->willReturnSelf();

        $client->expects($this->once())
            ->method('setQueryParams')
            ->with([])
            ->willReturnSelf();

        $client->expects($this->once())
            ->method('doRequest')
            ->willReturn($response);

        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($stream);

        $stream->expects($this->once())
            ->method('getContents')
            ->willReturn(json_encode([
                'payload' => [
                    [
                        'job_id' => 1,
                        'access_state' => 'open',
                        'draft' => false,
                        'active' => true,
                        'title' => 'Test Job',
                        'description' => 'A test job description.',
                        'internal_note' => 'Internal note.',
                        'date_end' => '2024-12-31T23:59:59Z',
                        'date_closed' => null,
                        'closed_duration' => 0,
                        'last_update' => '2024-01-01T00:00:00Z',
                        'date_created' => '2024-01-01T00:00:00Z',
                        'text_language' => 'en',
                        'fte' => null,
                        'workfields' => [],
                        'filterlist' => [],
                        'education' => [],
                        'disability' => null,
                        'details' => null,
                        'personalist' => [
                            'id' => 1,
                            'name' => 'Personalist Name'
                        ],
                        'contact' => [
                            'email' => 'contact@example.com',
                            'phone' => '1234567890'
                        ],
                        'sharing' => [],
                        'addresses' => [],
                        'employment' => [],
                        'stats' => [
                            'views' => 100,
                            'applications' => 10
                        ],
                        'salary' => [
                            'amount' => 50000,
                            'currency' => 'USD'
                        ],
                        'edit_link' => 'http://example.com/edit',
                        'public_link' => 'http://example.com/public'
                    ]
                ],
                'meta' => [
                    'code' => 'test',
                    'message' => 'test message'
                ]
            ], JSON_THROW_ON_ERROR));

        $apiService = new ApiService($client);
        $data = $apiService->getJobsDataPayload();

        $this->assertIsArray($data);
        $this->assertEquals(1, $data[0]['job_id']);
        $this->assertEquals('Test Job', $data[0]['title']);
    }
}
