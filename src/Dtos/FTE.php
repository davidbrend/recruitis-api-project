<?php

namespace Davebrend\RecruitisApiProject\Dtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class FTE extends BaseDto
{
    private float $value;
    private bool $active;

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): FTE
    {
        $this->value = $value;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): FTE
    {
        $this->active = $active;
        return $this;
    }
}