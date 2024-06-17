<?php

namespace Davebrend\RecruitisApiProject\Dtos\AdditionalDtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class WorkField extends BaseDto
{
    private int $id;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): WorkField
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): WorkField
    {
        $this->name = $name;
        return $this;
    }
}