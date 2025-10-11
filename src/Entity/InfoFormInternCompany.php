<?php

namespace App\Entity;

use App\Repository\InfoFormInternCompanyRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: InfoFormInternCompanyRepository::class)]
#[ApiResource]
class InfoFormInternCompany
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $companyName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contactName = null;

    #[ORM\OneToOne(mappedBy: 'infoFormInternCompany', cascade: ['persist', 'remove'])]
    private ?InfoFormIntern $infoFormIntern = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $name): static
    {
        $this->companyName = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(?string $contactName): static
    {
        $this->contactName = $contactName;

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
            $this->infoFormIntern->setInfoFormInternCompany(null);
        }

        // set the owning side of the relation if necessary
        if ($infoFormIntern !== null && $infoFormIntern->getInfoFormInternCompany() !== $this) {
            $infoFormIntern->setInfoFormInternCompany($this);
        }

        $this->infoFormIntern = $infoFormIntern;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
