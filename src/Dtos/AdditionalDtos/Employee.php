<?php

namespace Davebrend\RecruitisApiProject\Dtos\AdditionalDtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class Employee extends BaseDto
{
    private string $id;
    private string $name;
    private ?string $surname = null;
    private string $initials;
    private string $email;
    private string $photo_url;
    private ?string $phone = null;
    private ?string $linkedin = null;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Employee
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Employee
    {
        $this->name = $name;
        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): Employee
    {
        $this->surname = $surname;
        return $this;
    }

    public function getInitials(): string
    {
        return $this->initials;
    }

    public function setInitials(string $initials): Employee
    {
        $this->initials = $initials;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Employee
    {
        $this->email = $email;
        return $this;
    }

    public function getPhotoUrl(): string
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(string $photo_url): Employee
    {
        $this->photo_url = $photo_url;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): Employee
    {
        $this->phone = $phone;
        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): Employee
    {
        $this->linkedin = $linkedin;
        return $this;
    }
}