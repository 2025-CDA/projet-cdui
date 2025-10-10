<?php

namespace App\Entity;

use App\Enum\OrganizationRole;
use App\Repository\OrganizationMemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: OrganizationMemberRepository::class)]
#[ApiResource]

class OrganizationMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: OrganizationRole::class)]
    private ?OrganizationRole $role = null;

    #[ORM\OneToOne(mappedBy: 'organizationMember', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'organizationMembers')]
    private ?Organization $organization = null;

    /**
     * @var Collection<int, TrainingSession>
     */
    #[ORM\ManyToMany(targetEntity: TrainingSession::class, inversedBy: 'organizationMembers')]
    private Collection $trainingSession;

    public function __construct()
    {
        $this->trainingSession = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?OrganizationRole
    {
        return $this->role;
    }

    public function setRole(?OrganizationRole $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setOrganizationMember(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getOrganizationMember() !== $this) {
            $user->setOrganizationMember($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): static
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * @return Collection<int, TrainingSession>
     */
    public function getTrainingSession(): Collection
    {
        return $this->trainingSession;
    }

    public function addTrainingSession(TrainingSession $trainingSession): static
    {
        if (!$this->trainingSession->contains($trainingSession)) {
            $this->trainingSession->add($trainingSession);
        }

        return $this;
    }

    public function removeTrainingSession(TrainingSession $trainingSession): static
    {
        $this->trainingSession->removeElement($trainingSession);

        return $this;
    }
}
