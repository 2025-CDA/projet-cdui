<?php

namespace App\Entity;

use App\Repository\TrainingSessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingSessionRepository::class)]
class TrainingSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $offerNumber = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $internShipPeriodStart = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $internshipPeriodStart = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $internshipPeriodEnd = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $trainingPeriodStart = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $trainingPeriodEnd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfferNumber(): ?string
    {
        return $this->offerNumber;
    }

    public function setOfferNumber(?string $offerNumber): static
    {
        $this->offerNumber = $offerNumber;

        return $this;
    }

    public function getInternShipPeriodStart(): ?\DateTimeImmutable
    {
        return $this->internShipPeriodStart;
    }

    public function setInternShipPeriodStart(?\DateTimeImmutable $internShipPeriodStart): static
    {
        $this->internShipPeriodStart = $internShipPeriodStart;

        return $this;
    }

    public function getInternshipPeriodEnd(): ?\DateTimeImmutable
    {
        return $this->internshipPeriodEnd;
    }

    public function setInternshipPeriodEnd(?\DateTimeImmutable $internshipPeriodEnd): static
    {
        $this->internshipPeriodEnd = $internshipPeriodEnd;

        return $this;
    }

    public function getTrainingPeriodStart(): ?\DateTimeImmutable
    {
        return $this->trainingPeriodStart;
    }

    public function setTrainingPeriodStart(?\DateTimeImmutable $trainingPeriodStart): static
    {
        $this->trainingPeriodStart = $trainingPeriodStart;

        return $this;
    }

    public function getTrainingPeriodEnd(): ?\DateTimeImmutable
    {
        return $this->trainingPeriodEnd;
    }

    public function setTrainingPeriodEnd(?\DateTimeImmutable $trainingPeriodEnd): static
    {
        $this->trainingPeriodEnd = $trainingPeriodEnd;

        return $this;
    }
}
