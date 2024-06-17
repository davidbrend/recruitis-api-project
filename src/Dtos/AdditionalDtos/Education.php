<?php

namespace Davebrend\RecruitisApiProject\Dtos\AdditionalDtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class Education extends BaseDto
{
    private int $id;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Education
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Education
    {
        $this->name = $name;
        return $this;
    }
}