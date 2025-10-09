<?php

namespace App\Entity;

use App\Enum\EnumWorkLocation;
use App\Enum\WeekDays;
use App\Repository\CalendarFormDetailRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalendarFormDetailRepository::class)]
class CalendarFormDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: WeekDays::class)]
    private ?WeekDays $day = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startMorning = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endMorning = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startAfternoon = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endAfternoon = null;

    #[ORM\Column(nullable: true, enumType: EnumWorkLocation::class)]
    private ?EnumWorkLocation $workLocation = null;

    #[ORM\ManyToOne(inversedBy: 'calendarFormDetails')]
    private ?InfoFormCompany $infoFormCompany = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?WeekDays
    {
        return $this->day;
    }

    public function setDay(?WeekDays $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getStartMorning(): ?\DateTimeImmutable
    {
        return $this->startMorning;
    }

    public function setStartMorning(?\DateTimeImmutable $startMorning): static
    {
        $this->startMorning = $startMorning;

        return $this;
    }

    public function getEndMorning(): ?\DateTimeImmutable
    {
        return $this->endMorning;
    }

    public function setEndMorning(?\DateTimeImmutable $endMorning): static
    {
        $this->endMorning = $endMorning;

        return $this;
    }

    public function getStartAfternoon(): ?\DateTimeImmutable
    {
        return $this->startAfternoon;
    }

    public function setStartAfternoon(?\DateTimeImmutable $startAfternoon): static
    {
        $this->startAfternoon = $startAfternoon;

        return $this;
    }

    public function getEndAfternoon(): ?\DateTimeImmutable
    {
        return $this->endAfternoon;
    }

    public function setEndAfternoon(?\DateTimeImmutable $endAfternoon): static
    {
        $this->endAfternoon = $endAfternoon;

        return $this;
    }

    public function getWorkLocation(): ?EnumWorkLocation
    {
        return $this->workLocation;
    }

    public function setWorkLocation(?EnumWorkLocation $workLocation): static
    {
        $this->workLocation = $workLocation;

        return $this;
    }

    public function getInfoFormCompany(): ?InfoFormCompany
    {
        return $this->infoFormCompany;
    }

    public function setInfoFormCompany(?InfoFormCompany $infoFormCompany): static
    {
        $this->infoFormCompany = $infoFormCompany;

        return $this;
    }
}
