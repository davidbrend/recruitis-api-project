<?php

namespace Davebrend\RecruitisApiProject\Dtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;
use Davebrend\RecruitisApiProject\Enums\CurrencyEnum;
use Davebrend\RecruitisApiProject\Enums\UnitEnum;

class Salary extends BaseDto
{
    private bool $is_range;
    private bool $is_min_visible;
    private bool $is_max_visible;
    private float $min;
    private float $max;
    private CurrencyEnum $currency;
    private UnitEnum $unit;
    private bool $visible;
    private string $note;

    public function is_range(): bool
    {
        return $this->is_range;
    }

    public function setIsRange(bool $is_range): Salary
    {
        $this->is_range = $is_range;
        return $this;
    }

    public function is_min_visible(): bool
    {
        return $this->is_min_visible;
    }

    public function setIsMinvisible(bool $is_min_visible): Salary
    {
        $this->is_min_visible = $is_min_visible;
        return $this;
    }

    public function is_max_visible(): bool
    {
        return $this->is_max_visible;
    }

    public function setIsMaxvisible(bool $is_max_visible): Salary
    {
        $this->is_max_visible = $is_max_visible;
        return $this;
    }

    public function getMin(): float
    {
        return $this->min;
    }

    public function setMin(float $min): Salary
    {
        $this->min = $min;
        return $this;
    }

    public function getMax(): float
    {
        return $this->max;
    }

    public function setMax(float $max): Salary
    {
        $this->max = $max;
        return $this;
    }

    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    public function setCurrency(CurrencyEnum $currency): Salary
    {
        $this->currency = $currency;
        return $this;
    }

    public function getUnit(): UnitEnum
    {
        return $this->unit;
    }

    public function setUnit(UnitEnum $unit): Salary
    {
        $this->unit = $unit;
        return $this;
    }

    public function isVisible(): bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): Salary
    {
        $this->visible = $visible;
        return $this;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): Salary
    {
        $this->note = $note;
        return $this;
    }
}