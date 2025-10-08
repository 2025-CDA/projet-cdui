<?php

namespace App\Entity;

use App\Repository\TrainerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainerRepository::class)]
class Trainer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $trainerFullName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrainerFullName(): ?string
    {
        return $this->trainerFullName;
    }

    public function setTrainerFullName(?string $trainerFullName): static
    {
        $this->trainerFullName = $trainerFullName;

        return $this;
    }
}
