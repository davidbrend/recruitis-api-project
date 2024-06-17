<?php

namespace Davebrend\RecruitisApiProject\Dtos\AdditionalDtos;

use Carbon\Carbon;
use Davebrend\RecruitisApiProject\Base\BaseDto;
use Davebrend\RecruitisApiProject\Enums\AccessStateEnum;
use Davebrend\RecruitisApiProject\Enums\Query\TextLanguageEnum;

class Job extends BaseDto
{
    private int $job_id;
    private AccessStateEnum $access_state;
    private bool $draft;
    private bool $active;
    private string $title;
    private string $description;
    private string $internal_note;
    private ?Carbon $date_end;
    private ?Carbon $date_closed;
    private int $closed_duration;
    private Carbon $last_update;
    private Carbon $date_created;
    private TextLanguageEnum $text_language;
    private ?FTE $fte = null;
    /** @var WorkField[] $workfields */
    private array $workfields = [];
    /** @var FilterList[] $filterlist */
    private array $filterlist = [];
    /** @var Education[] $education */
    private array $education = [];
    private ?bool $disability = null;
    private ?Details $details = null;
    private Personalist $personalist;
    private Contact $contact;
    /** @var Employee[] $sharing */
    private array $sharing = [];
    /** @var Address[] $addresses  */
    private array $addresses = [];
    /** @var Employment[] $employment */
    private array $employment = [];
    private Stats $stats;
    private Salary $salary;
    private string $edit_link;
    private string $public_link;

    public function getJobId(): int
    {
        return $this->job_id;
    }

    public function setJobId(int $job_id): Job
    {
        $this->job_id = $job_id;
        return $this;
    }

    public function getAccessState(): AccessStateEnum
    {
        return $this->access_state;
    }

    public function setAccessState(AccessStateEnum $access_state): Job
    {
        $this->access_state = $access_state;
        return $this;
    }

    public function isDraft(): bool
    {
        return $this->draft;
    }

    public function setDraft(bool $draft): Job
    {
        $this->draft = $draft;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): Job
    {
        $this->active = $active;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Job
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Job
    {
        $this->description = $description;
        return $this;
    }

    public function getInternalNote(): string
    {
        return $this->internal_note;
    }

    public function setInternalNote(string $internal_note): Job
    {
        $this->internal_note = $internal_note;
        return $this;
    }

    public function getDateEnd(): ?Carbon
    {
        return $this->date_end;
    }

    public function setDateEnd(?Carbon $date_end): Job
    {
        $this->date_end = $date_end;
        return $this;
    }

    public function getDateClosed(): ?Carbon
    {
        return $this->date_closed;
    }

    public function setDateClosed(?Carbon $date_closed): Job
    {
        $this->date_closed = $date_closed;
        return $this;
    }

    public function getClosedDuration(): int
    {
        return $this->closed_duration;
    }

    public function setClosedDuration(int $closed_duration): Job
    {
        $this->closed_duration = $closed_duration;
        return $this;
    }

    public function getLastUpdate(): Carbon
    {
        return $this->last_update;
    }

    public function setLastUpdate(Carbon $lastUpdate): Job
    {
        $this->last_update = $lastUpdate;
        return $this;
    }

    public function getDateCreated(): Carbon
    {
        return $this->date_created;
    }

    public function setDateCreated(Carbon $date_created): Job
    {
        $this->date_created = $date_created;
        return $this;
    }

    public function getTextLanguage(): TextLanguageEnum
    {
        return $this->text_language;
    }

    public function setTextLanguage(TextLanguageEnum $text_language): Job
    {
        $this->text_language = $text_language;
        return $this;
    }

    public function getFte(): ?FTE
    {
        return $this->fte;
    }

    public function setFte(?FTE $fte): Job
    {
        $this->fte = $fte;
        return $this;
    }

    /**
     * @return WorkField[]
     */
    public function getWorkfields(): array
    {
        return $this->workfields;
    }

    /**
     * @param array<WorkField> $workfields
     * @return $this
     */
    public function setWorkfields(array $workfields): Job
    {
        $this->workfields = $workfields;
        return $this;
    }

    /**
     * @return FilterList[]
     */
    public function getFilterlist(): array
    {
        return $this->filterlist;
    }

    /**
     * @param array<FilterList> $filterlist
     * @return $this
     */
    public function setFilterlist(array $filterlist): Job
    {
        $this->filterlist = $filterlist;
        return $this;
    }

    /**
     * @return Education[]
     */
    public function getEducation(): array
    {
        return $this->education;
    }

    /**
     * @param array<Education> $education
     * @return $this
     */
    public function setEducation(array $education): Job
    {
        $this->education = $education;
        return $this;
    }

    public function getDisability(): ?bool
    {
        return $this->disability;
    }

    public function setDisability(?bool $disability): Job
    {
        $this->disability = $disability;
        return $this;
    }

    public function getDetails(): ?Details
    {
        return $this->details;
    }

    public function setDetails(?Details $details): Job
    {
        $this->details = $details;
        return $this;
    }

    public function getPersonalist(): Personalist
    {
        return $this->personalist;
    }

    public function setPersonalist(Personalist $personalist): Job
    {
        $this->personalist = $personalist;
        return $this;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function setContact(Contact $contact): Job
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return Employee[]
     */
    public function getSharing(): array
    {
        return $this->sharing;
    }

    /**
     * @param array<Employee> $sharing
     * @return $this
     */
    public function setSharing(array $sharing): Job
    {
        $this->sharing = $sharing;
        return $this;
    }

    /**
     * @return Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param array<Address> $addresses
     * @return $this
     */
    public function setAddresses(array $addresses): Job
    {
        $this->addresses = $addresses;
        return $this;
    }

    /**
     * @return Employment[]
     */
    public function getEmployment(): array
    {
        return $this->employment;
    }

    /**
     * @param array<Employment> $employment
     * @return $this
     */
    public function setEmployment(array $employment): Job
    {
        $this->employment = $employment;
        return $this;
    }

    public function getStats(): Stats
    {
        return $this->stats;
    }

    public function setStats(Stats $stats): Job
    {
        $this->stats = $stats;
        return $this;
    }

    public function getSalary(): Salary
    {
        return $this->salary;
    }

    public function setSalary(Salary $salary): Job
    {
        $this->salary = $salary;
        return $this;
    }

    public function getEditLink(): string
    {
        return $this->edit_link;
    }

    public function setEditLink(string $edit_link): Job
    {
        $this->edit_link = $edit_link;
        return $this;
    }

    public function getPublicLink(): string
    {
        return $this->public_link;
    }

    public function setPublicLink(string $public_link): Job
    {
        $this->public_link = $public_link;
        return $this;
    }

}