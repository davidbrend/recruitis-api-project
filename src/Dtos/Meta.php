<?php

namespace Davebrend\RecruitisApiProject\Dtos;

use Carbon\Carbon;

class Meta
{
    private ?string $code = null;
    private ?int $duration = null;
    private ?string $message = null;
    private mixed $cached = null; // is not defined what type is it
    private ?Carbon $cached_from = null;
    private ?int $entries_from = null;
    private ?int $entries_to = null;
    private ?int $entries_total = null;
    private ?int $entries_sum = null;

    /**
     * @param array<mixed> $data
     * @return self
     */
    public static function createFromArray(array $data): self
    {
        $obj = new self();
        $obj->setCode($data['code'] ?? null);
        $obj->setDuration($data['duration'] ?? null);
        $obj->setMessage($data['message'] ?? null);
        $obj->setCached($data['cached'] ?? null);
        $obj->setCachedFrom(isset($data['cached_from']) ? Carbon::parse($data['cached_from']) : null);
        $obj->setEntriesFrom($data['entries_from'] ?? null);
        $obj->setEntriesTo($data['entries_to'] ?? null);
        $obj->setEntriesTotal($data['entries_total'] ?? null);
        $obj->setEntriesSum($data['entries_sum'] ?? null);

        return $obj;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): Meta
    {
        $this->code = $code;
        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): Meta
    {
        $this->duration = $duration;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): Meta
    {
        $this->message = $message;
        return $this;
    }

    public function getCached(): mixed
    {
        return $this->cached;
    }

    public function setCached(mixed $cached): Meta
    {
        $this->cached = $cached;
        return $this;
    }

    public function getCachedFrom(): ?Carbon
    {
        return $this->cached_from;
    }

    public function setCachedFrom(?Carbon $cached_from): Meta
    {
        $this->cached_from = $cached_from;
        return $this;
    }

    public function getEntriesFrom(): ?int
    {
        return $this->entries_from;
    }

    public function setEntriesFrom(?int $entries_from): Meta
    {
        $this->entries_from = $entries_from;
        return $this;
    }

    public function getEntriesTo(): ?int
    {
        return $this->entries_to;
    }

    public function setEntriesTo(?int $entries_to): Meta
    {
        $this->entries_to = $entries_to;
        return $this;
    }

    public function getEntriesTotal(): ?int
    {
        return $this->entries_total;
    }

    public function setEntriesTotal(?int $entries_total): Meta
    {
        $this->entries_total = $entries_total;
        return $this;
    }

    public function getEntriesSum(): ?int
    {
        return $this->entries_sum;
    }

    public function setEntriesSum(?int $entries_sum): Meta
    {
        $this->entries_sum = $entries_sum;
        return $this;
    }
}