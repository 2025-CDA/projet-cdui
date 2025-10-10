<?php

namespace App\Entity;

use App\Repository\TrainingSessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: TrainingSessionRepository::class)]
#[ApiResource]

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

    /**
     * @var Collection<int, OrganizationMember>
     */
    #[ORM\ManyToMany(targetEntity: OrganizationMember::class, mappedBy: 'trainingSession')]
    private Collection $organizationMembers;

    #[ORM\ManyToOne(inversedBy: 'trainingSessions')]
    private ?Training $training = null;

    /**
     * @var Collection<int, InternMember>
     */
    #[ORM\ManyToMany(targetEntity: InternMember::class, mappedBy: 'trainingSession')]
    private Collection $internMembers;

    public function __construct()
    {
        $this->organizationMembers = new ArrayCollection();
        $this->internMembers = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, OrganizationMember>
     */
    public function getOrganizationMembers(): Collection
    {
        return $this->organizationMembers;
    }

    public function addOrganizationMember(OrganizationMember $organizationMember): static
    {
        if (!$this->organizationMembers->contains($organizationMember)) {
            $this->organizationMembers->add($organizationMember);
            $organizationMember->addTrainingSession($this);
        }

        return $this;
    }

    public function removeOrganizationMember(OrganizationMember $organizationMember): static
    {
        if ($this->organizationMembers->removeElement($organizationMember)) {
            $organizationMember->removeTrainingSession($this);
        }

        return $this;
    }

    public function getTraining(): ?Training
    {
        return $this->training;
    }

    public function setTraining(?Training $training): static
    {
        $this->training = $training;

        return $this;
    }

    /**
     * @return Collection<int, InternMember>
     */
    public function getInternMembers(): Collection
    {
        return $this->internMembers;
    }

    public function addInternMember(InternMember $internMember): static
    {
        if (!$this->internMembers->contains($internMember)) {
            $this->internMembers->add($internMember);
            $internMember->addTrainingSession($this);
        }

        return $this;
    }

    public function removeInternMember(InternMember $internMember): static
    {
        if ($this->internMembers->removeElement($internMember)) {
            $internMember->removeTrainingSession($this);
        }

        return $this;
    }
}
