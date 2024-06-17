<?php

namespace Tests\Facades;

use Davebrend\RecruitisApiProject\Clients\Query;
use Davebrend\RecruitisApiProject\Dtos\Job;
use Davebrend\RecruitisApiProject\Exceptions\RecruitisApiException;
use Davebrend\RecruitisApiProject\Services\ApiService;
use Davebrend\RecruitisApiProject\Facades\JobFacade;
use PHPUnit\Framework\TestCase;

class JobFacadeTest extends TestCase
{
    /**
     * @throws \JsonException|RecruitisApiException
     */
    public function testGetJobsByQuery(): void
    {
        $apiService = $this->createMock(ApiService::class);
        $query = $this->createMock(Query::class);

        $query->expects($this->once())
            ->method('getQueryParamString')
            ->willReturn([]);

        $apiService->expects($this->once())
            ->method('getJobsDataPayload')
            ->willReturn([
                [
                    'job_id' => 1,
                    'title' => 'Test Job'
                ]
            ]);

        $jobFacade = new JobFacade($apiService);
        $jobs = $jobFacade->getJobsByQuery($query);

        $this->assertIsArray($jobs);
        $this->assertArrayHasKey(1, $jobs);
        $this->assertInstanceOf(Job::class, $jobs[1]);
    }
}
