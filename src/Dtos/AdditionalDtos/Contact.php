<?php

namespace Davebrend\RecruitisApiProject\Dtos\AdditionalDtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class Contact extends BaseDto
{
    private string $name;
    private string $initials;
    private string $email;
    private string $phone;

    private ?Employee $employee = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Contact
    {
        $this->name = $name;
        return $this;
    }

    public function getInitials(): string
    {
        return $this->initials;
    }

    public function setInitials(string $initials): Contact
    {
        $this->initials = $initials;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): Contact
    {
        $this->employee = $employee;
        return $this;
    }
}