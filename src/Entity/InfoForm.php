<?php

namespace App\Entity;

use App\Enum\InfoFormStatus;
use App\Repository\InfoFormRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoFormRepository::class)]
class InfoForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: InfoFormStatus::class)]
    private ?InfoFormStatus $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?InfoFormStatus
    {
        return $this->status;
    }

    public function setStatus(?InfoFormStatus $status): static
    {
        $this->status = $status;

        return $this;
    }
}
