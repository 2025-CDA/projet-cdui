<?php

namespace App\Entity;

use App\Enum\InfoFormStatus;
use App\Repository\InfoFormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?Intern $intern = null;

    /**
     * @var Collection<int, Organization>
     */
    #[ORM\ManyToMany(targetEntity: Organization::class, mappedBy: 'infoForm')]
    private Collection $organizations;

    /**
     * @var Collection<int, Company>
     */
    #[ORM\ManyToMany(targetEntity: Company::class, mappedBy: 'infoForm')]
    private Collection $companies;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormOrganization $infoFormOrganization = null;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormIntern $infoFormIntern = null;

    #[ORM\OneToOne(inversedBy: 'infoForm', cascade: ['persist', 'remove'])]
    private ?InfoFormCompany $infoFormCompany = null;

    public function __construct()
    {
        $this->organizations = new ArrayCollection();
        $this->companies = new ArrayCollection();
    }

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

    public function getIntern(): ?Intern
    {
        return $this->intern;
    }

    public function setIntern(?Intern $intern): static
    {
        $this->intern = $intern;

        return $this;
    }

    /**
     * @return Collection<int, Organization>
     */
    public function getOrganizations(): Collection
    {
        return $this->organizations;
    }

    public function addOrganization(Organization $organization): static
    {
        if (!$this->organizations->contains($organization)) {
            $this->organizations->add($organization);
            $organization->addInfoForm($this);
        }

        return $this;
    }

    public function removeOrganization(Organization $organization): static
    {
        if ($this->organizations->removeElement($organization)) {
            $organization->removeInfoForm($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Company>
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): static
    {
        if (!$this->companies->contains($company)) {
            $this->companies->add($company);
            $company->addInfoForm($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): static
    {
        if ($this->companies->removeElement($company)) {
            $company->removeInfoForm($this);
        }

        return $this;
    }

    public function getInfoFormOrganization(): ?InfoFormOrganization
    {
        return $this->infoFormOrganization;
    }

    public function setInfoFormOrganization(?InfoFormOrganization $infoFormOrganization): static
    {
        $this->infoFormOrganization = $infoFormOrganization;

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
