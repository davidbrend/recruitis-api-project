<?php

namespace Davebrend\RecruitisApiProject\Dtos\AdditionalDtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class Personalist extends BaseDto
{
    private int $id;
    private string $name;
    private string $initials;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Personalist
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Personalist
    {
        $this->name = $name;
        return $this;
    }

    public function getInitials(): string
    {
        return $this->initials;
    }

    public function setInitials(string $initials): Personalist
    {
        $this->initials = $initials;
        return $this;
    }
}