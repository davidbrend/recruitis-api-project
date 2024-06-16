<?php

namespace Davebrend\RecruitisApiProject\Dtos;

use Davebrend\RecruitisApiProject\Base\BaseDto;

class Details extends BaseDto
{
    private ?string $facebook_picture_path = null;
    private ?string $opening_season = null;
    private ?string $remote_work = null;
    /** @var array<mixed> $suitable_for  */
    private array $suitable_for = [];

    /** @var array<string> $driving_license  */
    private array $driving_license = [];

    public function getFacebookPicturepath(): ?string
    {
        return $this->facebook_picture_path;
    }

    public function setFacebookPicturepath(string $facebook_picture_path): Details
    {
        $this->facebook_picture_path = $facebook_picture_path;
        return $this;
    }

    public function getOpeningSeason(): ?string
    {
        return $this->opening_season;
    }

    public function setOpeningSeason(string $opening_season): Details
    {
        $this->opening_season = $opening_season;
        return $this;
    }

    public function getRemoteWork(): ?string
    {
        return $this->remote_work;
    }

    public function setRemoteWork(string $remote_work): Details
    {
        $this->remote_work = $remote_work;
        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getSuitableFor(): array
    {
        return $this->suitable_for;
    }

    /**
     * @param array<mixed> $suitable_for
     * @return $this
     */
    public function setSuitableFor(array $suitable_for): Details
    {
        $this->suitable_for = $suitable_for;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getDrivingLicense(): array
    {
        return $this->driving_license;
    }

    /**
     * @param array<string> $driving_license
     * @return $this
     */
    public function setDrivingLicense(array $driving_license): Details
    {
        $this->driving_license = $driving_license;
        return $this;
    }
}