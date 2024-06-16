<?php

namespace App\Tests\Facades;

use Davebrend\RecruitisApiProject\Client\Query;
use Davebrend\RecruitisApiProject\Dtos\Job;
use Davebrend\RecruitisApiProject\Services\ApiService;
use Davebrend\RecruitisApiProject\Facades\JobFacade;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

class JobFacadeTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function testGetJobsByQuery(): void
    {
        $apiService = $this->createMock(ApiService::class);
        $query = $this->createMock(Query::class);

        $query->expects($this->once())
            ->method('getQueryParamString')
            ->willReturn([]);

        $apiService->expects($this->once())
            ->method('getJobsData')
            ->willReturn(['payload' => [['job_id' => 1, 'title' => 'Test Job']]]);

        $jobFacade = new JobFacade($apiService);
        $jobs = $jobFacade->getJobsByQuery($query);

        $this->assertIsArray($jobs);
        $this->assertArrayHasKey(1, $jobs);
        $this->assertInstanceOf(Job::class, $jobs[1]);
    }
}
