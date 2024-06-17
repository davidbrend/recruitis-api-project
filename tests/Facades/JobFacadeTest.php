<?php

namespace Tests\Facades;

use Davebrend\RecruitisApiProject\Clients\Query;
use Davebrend\RecruitisApiProject\Dtos\AdditionalDtos\Job;
use Davebrend\RecruitisApiProject\Exceptions\RecruitisApiException;
use Davebrend\RecruitisApiProject\Facades\JobFacade;
use Davebrend\RecruitisApiProject\Services\ApiService;
use JsonException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class JobFacadeTest extends TestCase
{
    /**
     * @throws JsonException|RecruitisApiException|ReflectionException
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
        $this->assertEquals('Test Job', $jobs[1]->getTitle());
    }

    /**
     * @throws ReflectionException
     */
    public function testGetRecruitisApiDtoByQuery(): void
    {
        $apiService = $this->createMock(ApiService::class);
        $query = $this->createMock(Query::class);

        $query->expects($this->once())
            ->method('getQueryParamString')
            ->willReturn([]);

        $apiService->expects($this->once())
            ->method('getJobsData')
            ->willReturn([
                'payload' => [
                    [
                        'job_id' => 1,
                        'title' => 'Test Job'
                    ]
                ],
                'meta' => [
                    'code' => 'test',
                    'message' => 'test message'
                ]
            ]);

        $jobFacade = new JobFacade($apiService);
        $recruitisApiDto = $jobFacade->getRecruitisApiDtoByQuery($query);

        $this->assertCount(1, $recruitisApiDto->getJobs());
        $this->assertEquals('Test Job', $recruitisApiDto->getJobs()[1]->getTitle());
        $this->assertEquals('test', $recruitisApiDto->getMeta()->getCode());
        $this->assertEquals('test message', $recruitisApiDto->getMeta()->getMessage());
    }
}
