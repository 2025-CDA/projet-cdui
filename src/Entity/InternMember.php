<?php

namespace App\Entity;

use App\Repository\InternMemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: InternMemberRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource]
class InternMember
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
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'internMember', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @var Collection<int, TrainingSession>
     */
    #[ORM\ManyToMany(targetEntity: TrainingSession::class, inversedBy: 'internMembers')]
    private Collection $trainingSession;

    /**
     * @var Collection<int, InfoForm>
     */
    #[ORM\OneToMany(targetEntity: InfoForm::class, mappedBy: 'internMember')]
    private Collection $infoForm;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->trainingSession = new ArrayCollection();
        $this->infoForm = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setInternMember(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getInternMember() !== $this) {
            $user->setInternMember($this);
        }

        $this->user = $user;

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

    /**
     * @return Collection<int, InfoForm>
     */
    public function getInfoForm(): Collection
    {
        return $this->infoForm;
    }

    public function addInfoForm(InfoForm $infoForm): static
    {
        if (!$this->infoForm->contains($infoForm)) {
            $this->infoForm->add($infoForm);
            $infoForm->setInternMember($this);
        }

        return $this;
    }

    public function removeInfoForm(InfoForm $infoForm): static
    {
        if ($this->infoForm->removeElement($infoForm)) {
            // set the owning side to null (unless already changed)
            if ($infoForm->getInternMember() === $this) {
                $infoForm->setInternMember(null);
            }
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
