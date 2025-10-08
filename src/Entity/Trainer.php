<?php

namespace App\Entity;

use App\Repository\TrainerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainerRepository::class)]
class Trainer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fullName = null;

    #[ORM\OneToOne(mappedBy: 'trainer', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @var Collection<int, TrainingCourseSession>
     */
    #[ORM\ManyToMany(targetEntity: TrainingCourseSession::class, mappedBy: 'trainer')]
    private Collection $trainingCourseSessions;

    public function __construct()
    {
        $this->trainingCourseSessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): static
    {
        $this->fullName = $fullName;

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
            $this->user->setTrainer(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getTrainer() !== $this) {
            $user->setTrainer($this);
        }

        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, TrainingCourseSession>
     */
    public function getTrainingCourseSessions(): Collection
    {
        return $this->trainingCourseSessions;
    }

    public function addTrainingCourseSession(TrainingCourseSession $trainingCourseSession): static
    {
        if (!$this->trainingCourseSessions->contains($trainingCourseSession)) {
            $this->trainingCourseSessions->add($trainingCourseSession);
            $trainingCourseSession->addTrainer($this);
        }

        return $this;
    }

    public function removeTrainingCourseSession(TrainingCourseSession $trainingCourseSession): static
    {
        if ($this->trainingCourseSessions->removeElement($trainingCourseSession)) {
            $trainingCourseSession->removeTrainer($this);
        }

        return $this;
    }

}
