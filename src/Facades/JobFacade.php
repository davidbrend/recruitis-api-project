<?php

namespace Davebrend\RecruitisApiProject\Facades;

use Davebrend\RecruitisApiProject\Client\Query;
use Davebrend\RecruitisApiProject\Dtos\Job;
use Davebrend\RecruitisApiProject\Services\ApiService;
use GuzzleHttp\Exception\GuzzleException;

class JobFacade
{
    public function __construct(protected ApiService $recruitisService)
    {
    }


    /**
     * @param Query $query
     * @return array<Job>
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function getJobsByQuery(Query $query): array
    {
        $data = $this->recruitisService->getJobsData($query->getQueryParamString());

        $results = [];
        foreach ($data['payload'] ?? [] as $jobData) {
            $job = Job::fromArray($jobData);
            $results[$job->getJobId()] = $job;
        }

        return $results;
    }
}