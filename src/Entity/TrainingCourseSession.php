<?php

namespace App\Entity;

use App\Repository\TrainingCourseSessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingCourseSessionRepository::class)]
class TrainingCourseSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $offerNumber = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    #[ORM\OneToOne(mappedBy: 'trainingCourseSession', cascade: ['persist', 'remove'])]
    private ?InfoFormIntern $infoFormIntern = null;

    #[ORM\OneToOne(inversedBy: 'trainingCourseSession', cascade: ['persist', 'remove'])]
    private ?TrainingCourse $trainingCourse = null;

    /**
     * @var Collection<int, Trainer>
     */
    #[ORM\ManyToMany(targetEntity: Trainer::class, inversedBy: 'trainingCourseSessions')]
    private Collection $trainer;

    public function __construct()
    {
        $this->trainer = new ArrayCollection();
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

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getInfoFormIntern(): ?InfoFormIntern
    {
        return $this->infoFormIntern;
    }

    public function setInfoFormIntern(?InfoFormIntern $infoFormIntern): static
    {
        // unset the owning side of the relation if necessary
        if ($infoFormIntern === null && $this->infoFormIntern !== null) {
            $this->infoFormIntern->setTrainingCourseSession(null);
        }

        // set the owning side of the relation if necessary
        if ($infoFormIntern !== null && $infoFormIntern->getTrainingCourseSession() !== $this) {
            $infoFormIntern->setTrainingCourseSession($this);
        }

        $this->infoFormIntern = $infoFormIntern;

        return $this;
    }

    public function getTrainingCourse(): ?TrainingCourse
    {
        return $this->trainingCourse;
    }

    public function setTrainingCourse(?TrainingCourse $trainingCourse): static
    {
        $this->trainingCourse = $trainingCourse;

        return $this;
    }

    /**
     * @return Collection<int, Trainer>
     */
    public function getTrainer(): Collection
    {
        return $this->trainer;
    }

    public function addTrainer(Trainer $trainer): static
    {
        if (!$this->trainer->contains($trainer)) {
            $this->trainer->add($trainer);
        }

        return $this;
    }

    public function removeTrainer(Trainer $trainer): static
    {
        $this->trainer->removeElement($trainer);

        return $this;
    }
}
