<?php

namespace App\Entity;

use App\Enum\EnumWorkLocation;
use App\Repository\WorkLocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkLocationRepository::class)]
class WorkLocation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: EnumWorkLocation::class)]
    private ?EnumWorkLocation $workLocationLabel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorkLocationLabel(): ?EnumWorkLocation
    {
        return $this->workLocationLabel;
    }

    public function setWorkLocationLabel(?EnumWorkLocation $workLocationLabel): static
    {
        $this->workLocationLabel = $workLocationLabel;

        return $this;
    }
}
