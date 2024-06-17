<?php

namespace Davebrend\RecruitisApiProject\Dtos\AdditionalDtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class Stats extends BaseDto
{
    private int $answers;
    private int $views;
    /** @var array<mixed> $flow_answers */
    private array $flow_answers = [];

    public function getAnswers(): int
    {
        return $this->answers;
    }

    public function setAnswers(int $answers): Stats
    {
        $this->answers = $answers;
        return $this;
    }

    public function getViews(): int
    {
        return $this->views;
    }

    public function setViews(int $views): Stats
    {
        $this->views = $views;
        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getFlowAnswers(): array
    {
        return $this->flow_answers;
    }

    /**
     * @param array<mixed> $flow_answers
     * @return $this
     */
    public function setFlowAnswers(array $flow_answers): Stats
    {
        $this->flow_answers = $flow_answers;
        return $this;
    }
}