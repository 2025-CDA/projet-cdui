<?php

namespace App\Entity;

use App\Enum\OrganizationRole;
use App\Repository\OrganizationMemberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganizationMemberRepository::class)]
class OrganizationMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: OrganizationRole::class)]
    private ?OrganizationRole $role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?OrganizationRole
    {
        return $this->role;
    }

    public function setRole(?OrganizationRole $role): static
    {
        $this->role = $role;

        return $this;
    }
}
