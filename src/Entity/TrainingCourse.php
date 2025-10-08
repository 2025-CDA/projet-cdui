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
    private ?string $formationName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormationName(): ?string
    {
        return $this->formationName;
    }

    public function setFormationName(?string $formationName): static
    {
        $this->formationName = $formationName;

        return $this;
    }
}
