<?php

namespace Davebrend\RecruitisApiProject\Dtos;

use Davebrend\RecruitisApiProject\Dtos\AdditionalDtos\Job;

class RecruitisApiDto
{
    /** @var array<Job> $jobs */
    private array $jobs = [];

    private Meta $meta;

    public function addJob(Job $job): self
    {
        $this->jobs[$job->getJobId()] = $job;
        return $this;
    }

    /**
     * @return Job[]
     */
    public function getJobs(): array
    {
        return $this->jobs;
    }

    /**
     * @param array<Job> $jobs
     * @return $this
     */
    public function setJobs(array $jobs): RecruitisApiDto
    {
        $this->jobs = $jobs;
        return $this;
    }

    public function getMeta(): Meta
    {
        return $this->meta;
    }

    public function setMeta(Meta $meta): RecruitisApiDto
    {
        $this->meta = $meta;
        return $this;
    }
}