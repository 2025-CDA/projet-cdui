<?php

namespace App\Entity;

use App\Repository\InfoFormOrganizationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoFormOrganizationRepository::class)]
class InfoFormOrganization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
