<?php

namespace App\Entity;

use App\Enum\InfoFormStatus;
use App\Repository\InfoFormRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: InfoFormRepository::class)]
#[ApiResource]
class InfoForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, enumType: InfoFormStatus::class)]
    private ?InfoFormStatus $status = null;

    #[ORM\ManyToOne(inversedBy: 'infoForm')]
    private ?InternMember $internMember = null;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormIntern $infoFormIntern = null;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormOrganization $inforFormOrganization = null;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormCompany $infoFormCompany = null;

    #[ORM\ManyToOne(inversedBy: 'infoForms')]
    private ?Company $company = null;

    #[ORM\ManyToOne(inversedBy: 'infoForms')]
    private ?Organization $organization = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

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

    public function getInternMember(): ?InternMember
    {
        return $this->internMember;
    }

    public function setInternMember(?InternMember $internMember): static
    {
        $this->internMember = $internMember;

        return $this;
    }

    public function getInfoFormIntern(): ?InfoFormIntern
    {
        return $this->infoFormIntern;
    }

    public function setInfoFormIntern(?InfoFormIntern $infoFormIntern): static
    {
        $this->infoFormIntern = $infoFormIntern;

        return $this;
    }

    public function getInforFormOrganization(): ?InfoFormOrganization
    {
        return $this->inforFormOrganization;
    }

    public function setInforFormOrganization(?InfoFormOrganization $inforFormOrganization): static
    {
        $this->inforFormOrganization = $inforFormOrganization;

        return $this;
    }

    public function getInfoFormCompany(): ?InfoFormCompany
    {
        return $this->infoFormCompany;
    }

    public function setInfoFormCompany(?InfoFormCompany $infoFormCompany): static
    {
        $this->infoFormCompany = $infoFormCompany;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): static
    {
        $this->organization = $organization;

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
