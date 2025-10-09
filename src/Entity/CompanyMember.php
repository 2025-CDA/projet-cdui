<?php

namespace App\Entity;

use App\Enum\CompanyRole;
use App\Repository\CompanyMemberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyMemberRepository::class)]
class CompanyMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: CompanyRole::class)]
    private ?CompanyRole $role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?CompanyRole
    {
        return $this->role;
    }

    public function setRole(?CompanyRole $role): static
    {
        $this->role = $role;

        return $this;
    }
}
