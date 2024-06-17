<?php

namespace Davebrend\RecruitisApiProject\Facades;

use Davebrend\RecruitisApiProject\Clients\Query;
use Davebrend\RecruitisApiProject\Dtos\AdditionalDtos\Job;
use Davebrend\RecruitisApiProject\Dtos\Meta;
use Davebrend\RecruitisApiProject\Dtos\RecruitisApiDto;
use Davebrend\RecruitisApiProject\Exceptions\RecruitisApiException;
use Davebrend\RecruitisApiProject\Services\ApiService;
use ReflectionException;

class JobFacade
{
    public function __construct(protected ApiService $recruitisService)
    {
    }


    /**
     * @param Query $query
     * @return array<Job>
     * @throws \JsonException
     * @throws RecruitisApiException|ReflectionException
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

    /**
     * @throws ReflectionException
     */
    public function getRecruitisApiDtoByQuery(Query $query): RecruitisApiDto
    {
        $data = $this->recruitisService->getJobsData($query->getQueryParamString());

        $recruitisApiDto = new RecruitisApiDto();
        foreach ($data['payload'] as $jobData) {
            $recruitisApiDto->addJob(Job::fromArray($jobData));
        }
        $recruitisApiDto->setMeta(Meta::createFromArray($data['meta'])); // meta should exists in this moment already

        return $recruitisApiDto;
    }
}