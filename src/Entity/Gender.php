<?php

namespace App\Entity;

use App\Enum\EnumGender;
use App\Repository\GenderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenderRepository::class)]
class Gender
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: EnumGender::class)]
    private ?EnumGender $genderLabel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenderLabel(): ?EnumGender
    {
        return $this->genderLabel;
    }

    public function setGenderLabel(?EnumGender $genderLabel): static
    {
        $this->genderLabel = $genderLabel;

        return $this;
    }
}
