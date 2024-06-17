<?php

namespace Davebrend\RecruitisApiProject\Dtos\AdditionalDtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class FilterList extends BaseDto
{
    private int $id;
    private string $name;
    private string $group;
    private int $group_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): FilterList
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): FilterList
    {
        $this->name = $name;
        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): FilterList
    {
        $this->group = $group;
        return $this;
    }

    public function getGroupId(): int
    {
        return $this->group_id;
    }

    public function setGroupId(int $group_id): FilterList
    {
        $this->group_id = $group_id;
        return $this;
    }
}