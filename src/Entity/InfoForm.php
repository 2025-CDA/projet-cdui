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

    #[ORM\ManyToOne(inversedBy: 'infoForm')]
    private ?InternMember $internMember = null;

    #[ORM\ManyToOne(inversedBy: 'infoForm')]
    private ?CompanyMember $companyMember = null;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormIntern $infoFormIntern = null;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormOrganization $inforFormOrganization = null;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormCompany $infoFormCompany = null;

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

    public function getCompanyMember(): ?CompanyMember
    {
        return $this->companyMember;
    }

    public function setCompanyMember(?CompanyMember $companyMember): static
    {
        $this->companyMember = $companyMember;

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
}
