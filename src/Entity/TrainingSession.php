<?php

namespace App\Entity;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\TrainingSessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;


#[ORM\Entity(repositoryClass: TrainingSessionRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(order: ['createdAt' => 'DESC'])]
#[Get(normalizationContext: ['groups' => ['read:training_session']])]
#[GetCollection(normalizationContext: ['groups' => ['read:training_session_collection']])]
#[Post(denormalizationContext: ['groups' => ['create:training_session']])]
#[Patch(denormalizationContext: ['groups' => ['update:training_session']])]
#[Put(denormalizationContext: ['groups' => ['update:training_session']])]
#[Delete]
class TrainingSession
{
    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        // Set the createdAt and updatedAt values on initial creation
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        // Set the updatedAt value on every update
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection',
        'create:training_session',
        'update:training_session'
    ])]
    private ?string $offerNumber = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection',
        'create:training_session',
        'update:training_session'
    ])]
    private ?\DateTimeImmutable $internshipPeriodStart = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection',
        'create:training_session',
        'update:training_session'
    ])]
    private ?\DateTimeImmutable $internshipPeriodEnd = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection',
        'create:training_session',
        'update:training_session'
    ])]
    private ?\DateTimeImmutable $trainingPeriodStart = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection',
        'create:training_session',
        'update:training_session'
    ])]
    private ?\DateTimeImmutable $trainingPeriodEnd = null;

    /**
     * @var Collection<int, OrganizationMember>
     */
    #[ORM\ManyToMany(targetEntity: OrganizationMember::class, mappedBy: 'trainingSession')]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection',
        'create:training_session',
        'update:training_session'
    ])]
    private Collection $organizationMembers;

    #[ORM\ManyToOne(inversedBy: 'trainingSessions')]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection',
        'create:training_session',
        'update:training_session'
    ])]
    private ?Training $training = null;

    /**
     * @var Collection<int, InternMember>
     */
    #[ORM\ManyToMany(targetEntity: InternMember::class, mappedBy: 'trainingSession')]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection',
        'create:training_session',
        'update:training_session'
    ])]
    private Collection $internMembers;

    #[ORM\Column(nullable: true)]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection'
    ])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    #[MaxDepth(1)]
    #[Groups([
        'read:training_session',
        'read:training_session_collection'
    ])]
    private ?\DateTimeImmutable $createdAt = null;

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
        return $this->internshipPeriodStart;
    }

    public function setInternShipPeriodStart(?\DateTimeImmutable $internShipPeriodStart): static
    {
        $this->internshipPeriodStart = $internShipPeriodStart;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
