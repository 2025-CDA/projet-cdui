<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
#[ApiResource]

class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    /**
     * @var Collection<int, CompanyMember>
     */
    #[ORM\OneToMany(targetEntity: CompanyMember::class, mappedBy: 'company')]
    private Collection $companyMembers;

    /**
     * @var Collection<int, InfoForm>
     */
    #[ORM\OneToMany(targetEntity: InfoForm::class, mappedBy: 'company')]
    private Collection $infoForms;

    public function __construct()
    {
        $this->companyMembers = new ArrayCollection();
        $this->infoForms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return Collection<int, CompanyMember>
     */
    public function getCompanyMembers(): Collection
    {
        return $this->companyMembers;
    }

    public function addCompanyMember(CompanyMember $companyMember): static
    {
        if (!$this->companyMembers->contains($companyMember)) {
            $this->companyMembers->add($companyMember);
            $companyMember->setCompany($this);
        }

        return $this;
    }

    public function removeCompanyMember(CompanyMember $companyMember): static
    {
        if ($this->companyMembers->removeElement($companyMember)) {
            // set the owning side to null (unless already changed)
            if ($companyMember->getCompany() === $this) {
                $companyMember->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, InfoForm>
     */
    public function getInfoForms(): Collection
    {
        return $this->infoForms;
    }

    public function addInfoForm(InfoForm $infoForm): static
    {
        if (!$this->infoForms->contains($infoForm)) {
            $this->infoForms->add($infoForm);
            $infoForm->setCompany($this);
        }

        return $this;
    }

    public function removeInfoForm(InfoForm $infoForm): static
    {
        if ($this->infoForms->removeElement($infoForm)) {
            // set the owning side to null (unless already changed)
            if ($infoForm->getCompany() === $this) {
                $infoForm->setCompany(null);
            }
        }

        return $this;
    }
}
