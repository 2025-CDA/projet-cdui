<?php

namespace App\Entity;

use App\Enum\WeekDay;
use App\Enum\WorkLocation;
use App\Repository\InfoFormCompanyCalendarRowRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoFormCompanyCalendarRowRepository::class)]
class InfoFormCompanyCalendarRow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: WeekDay::class)]
    private ?WeekDay $day = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startMorning = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endMorning = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startAfternoon = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endAfternoon = null;

    #[ORM\Column(nullable: true, enumType: WorkLocation::class)]
    private ?WorkLocation $workLocation = null;

    #[ORM\ManyToOne(inversedBy: 'infoFormCompanyCalendarRow')]
    private ?InfoFormCompany $infoFormCompany = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?WeekDay
    {
        return $this->day;
    }

    public function setDay(?WeekDay $day): static
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

    public function getWorkLocation(): ?WorkLocation
    {
        return $this->workLocation;
    }

    public function setWorkLocation(?WorkLocation $workLocation): static
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
