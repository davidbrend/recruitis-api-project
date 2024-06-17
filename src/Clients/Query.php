<?php

namespace Davebrend\RecruitisApiProject\Clients;

use Davebrend\RecruitisApiProject\Enums\Query\OrderByEnum;
use Davebrend\RecruitisApiProject\Enums\Query\TextLanguageEnum;
use Davebrend\RecruitisApiProject\Enums\AccessStateEnum;
use Davebrend\RecruitisApiProject\Enums\ActivityStateEnum;
use Carbon\Carbon;

class Query
{
    protected const LIMIT_MAX_VALUE = 50;
    protected const LIMIT_DEFAULT_VALUE = 10;
    protected const PAGE_DEFAULT_VALUE = 1;

    private ?int $limit = self::LIMIT_DEFAULT_VALUE; // default: 10, max <= 50
    private ?int $page = self::PAGE_DEFAULT_VALUE; // default: 1
    private ?bool $withAutomation = null; // 1 - on, 0 - off
    private ?TextLanguageEnum $textLanguage = null;
    /** @var int[] $workfieldIds  */
    private array $workfieldIds = [];

    /** @var int[] $officeIds  */
    private array $officeIds = [];

    /** @var int[] $filterIds  */
    private array $filterIds = [];

    /** @var int[] $channelIds  */
    private array $channelIds = [];
    private ?OrderByEnum $orderBy = OrderByEnum::DATE_CREATED; // default: OrderByEnum::DATE_CREATED;
    private ?ActivityStateEnum $activityState = ActivityStateEnum::ACTIVE_POSITION; // default: ActivityStateEnum::ACTIVE_POSITION;
    private ?AccessStateEnum $accessState = null;
    private ?bool $withRewards = null; // 1 - on, 0 - off
    private ?Carbon $updatedFrom = null; // format: YYYY-mm-dd HH:mm:ss
    private ?Carbon $updatedTo = null; // format: YYYY-mm-dd HH:mm:ss

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(int $limit = self::LIMIT_DEFAULT_VALUE): Query
    {
        $this->limit = $limit >= self::LIMIT_MAX_VALUE ? self::LIMIT_MAX_VALUE : $this->limit;
        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): Query
    {
        $this->page = $page;
        return $this;
    }

    public function getWithAutomation(): ?bool
    {
        return $this->withAutomation;
    }

    public function setWithAutomation(?bool $withAutomation): Query
    {
        $this->withAutomation = $withAutomation;
        return $this;
    }

    public function getTextLanguage(): ?TextLanguageEnum
    {
        return $this->textLanguage;
    }

    public function setTextLanguage(?TextLanguageEnum $textLanguage): Query
    {
        $this->textLanguage = $textLanguage;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getWorkfieldIds(): array
    {
        return $this->workfieldIds;
    }

    /**
     * @param array<int> $workfieldIds
     * @return $this
     */
    public function setWorkfieldIds(array $workfieldIds): Query
    {
        $this->workfieldIds = $workfieldIds;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getOfficeIds(): array
    {
        return $this->officeIds;
    }

    /**
     * @param array<int> $officeIds
     * @return $this
     */
    public function setOfficeIds(array $officeIds): Query
    {
        $this->officeIds = $officeIds;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getFilterIds(): array
    {
        return $this->filterIds;
    }

    /**
     * @param array<int> $filterIds
     * @return $this
     */
    public function setFilterIds(array $filterIds): Query
    {
        $this->filterIds = $filterIds;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getChannelIds(): array
    {
        return $this->channelIds;
    }

    /**
     * @param array<int> $channelIds
     * @return $this
     */
    public function setChannelIds(array $channelIds): Query
    {
        $this->channelIds = $channelIds;
        return $this;
    }

    public function getOrderBy(): ?OrderByEnum
    {
        return $this->orderBy;
    }

    public function setOrderBy(?OrderByEnum $orderBy): Query
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    public function getActivityState(): ?ActivityStateEnum
    {
        return $this->activityState;
    }

    public function setActivityState(?ActivityStateEnum $activityState): Query
    {
        $this->activityState = $activityState;
        return $this;
    }

    public function getAccessState(): ?AccessStateEnum
    {
        return $this->accessState;
    }

    public function setAccessState(?AccessStateEnum $accessState): Query
    {
        $this->accessState = $accessState;
        return $this;
    }

    public function getWithRewards(): ?bool
    {
        return $this->withRewards;
    }

    public function setWithRewards(?bool $withRewards): Query
    {
        $this->withRewards = $withRewards;
        return $this;
    }

    public function getUpdatedFrom(): ?Carbon
    {
        return $this->updatedFrom;
    }

    public function setUpdatedFrom(?Carbon $updatedFrom): Query
    {
        $this->updatedFrom = $updatedFrom;
        return $this;
    }

    public function getUpdatedTo(): ?Carbon
    {
        return $this->updatedTo;
    }

    public function setUpdatedTo(?Carbon $updatedTo): Query
    {
        $this->updatedTo = $updatedTo;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getQueryParamString(): array
    {
        $params = [
            'limit' => $this->limit,
            'page' => $this->page,
            'with_automation' => $this->withAutomation,
            'text_language' => $this->textLanguage?->value,
            'workfield_id' => $this->workfieldIds ?? null,
            'office_id' => $this->officeIds ?? null,
            'filter_id' => $this->filterIds ?? null,
            'channel_id' => $this->channelIds ?? null,
            'order_by' => $this->orderBy?->value,
            'activity_state' => $this->activityState?->value,
            'access_state' => $this->accessState?->value,
            'with_rewards' => $this->withRewards,
            'updated_from' => $this->updatedFrom?->format('Y-m-d H:i:s'),
            'updated_to' => $this->updatedTo?->format('Y-m-d H:i:s'),
        ];

        return array_filter($params, fn($value) => !is_null($value));
    }
}