<?php

namespace Davebrend\RecruitisApiProject\Facades;

use Davebrend\RecruitisApiProject\Clients\Query;
use Davebrend\RecruitisApiProject\Dtos\Job;
use Davebrend\RecruitisApiProject\Exceptions\RecruitisApiException;
use Davebrend\RecruitisApiProject\Services\ApiService;

class JobFacade
{
    public function __construct(protected ApiService $recruitisService)
    {
    }


    /**
     * @param Query $query
     * @return array<Job>
     * @throws \JsonException
     * @throws RecruitisApiException
     */
    public function getJobsByQuery(Query $query): array
    {
        $data = $this->recruitisService->getJobsDataPayload($query->getQueryParamString());

        $results = [];
        foreach ($data as $jobData) {
            $job = Job::fromArray($jobData);
            $results[$job->getJobId()] = $job;
        }

        return $results;
    }
}