<?php

namespace App\Entity;

use App\Repository\TrainingCourseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingCourseRepository::class)]
class TrainingCourse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'trainingCourse', cascade: ['persist', 'remove'])]
    private ?TrainingCourseSession $trainingCourseSession = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getTrainingCourseSession(): ?TrainingCourseSession
    {
        return $this->trainingCourseSession;
    }

    public function setTrainingCourseSession(?TrainingCourseSession $trainingCourseSession): static
    {
        // unset the owning side of the relation if necessary
        if ($trainingCourseSession === null && $this->trainingCourseSession !== null) {
            $this->trainingCourseSession->setTrainingCourse(null);
        }

        // set the owning side of the relation if necessary
        if ($trainingCourseSession !== null && $trainingCourseSession->getTrainingCourse() !== $this) {
            $trainingCourseSession->setTrainingCourse($this);
        }

        $this->trainingCourseSession = $trainingCourseSession;

        return $this;
    }


}
