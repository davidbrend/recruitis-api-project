<?php

namespace Davebrend\RecruitisApiProject\Dtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class Address extends BaseDto
{
    private int $id;
    private int $office_id;
    private string $city;
    private string $postCode;
    private string $street;
    private string $region;
    private string $state;
    private bool $is_primary;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Address
    {
        $this->id = $id;
        return $this;
    }

    public function getOfficeId(): int
    {
        return $this->office_id;
    }

    public function setOfficeId(int $office_id): Address
    {
        $this->office_id = $office_id;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): Address
    {
        $this->postCode = $postCode;
        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): Address
    {
        $this->region = $region;
        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    public function is_primary(): bool
    {
        return $this->is_primary;
    }

    public function setIsPrimary(bool $is_primary): Address
    {
        $this->is_primary = $is_primary;
        return $this;
    }
}