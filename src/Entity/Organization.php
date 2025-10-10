<?php

namespace App\Entity;

use App\Repository\OrganizationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: OrganizationRepository::class)]
#[ApiResource]

class Organization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    /**
     * @var Collection<int, OrganizationMember>
     */
    #[ORM\OneToMany(targetEntity: OrganizationMember::class, mappedBy: 'organization')]
    private Collection $organizationMembers;

    /**
     * @var Collection<int, InfoForm>
     */
    #[ORM\OneToMany(targetEntity: InfoForm::class, mappedBy: 'organization')]
    private Collection $infoForms;

    public function __construct()
    {
        $this->organizationMembers = new ArrayCollection();
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

    /**
     * @return Collection<int, OrganizationMember>
     */
    public function getOrganizationMembers(): Collection
    {
        return $this->organizationMembers;
    }

    public function addOrganizationMember(OrganizationMember $organizationMember): static
    {
        if (!$this->organizationMembers->contains($organizationMember)) {
            $this->organizationMembers->add($organizationMember);
            $organizationMember->setOrganization($this);
        }

        return $this;
    }

    public function removeOrganizationMember(OrganizationMember $organizationMember): static
    {
        if ($this->organizationMembers->removeElement($organizationMember)) {
            // set the owning side to null (unless already changed)
            if ($organizationMember->getOrganization() === $this) {
                $organizationMember->setOrganization(null);
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
            $infoForm->setOrganization($this);
        }

        return $this;
    }

    public function removeInfoForm(InfoForm $infoForm): static
    {
        if ($this->infoForms->removeElement($infoForm)) {
            // set the owning side to null (unless already changed)
            if ($infoForm->getOrganization() === $this) {
                $infoForm->setOrganization(null);
            }
        }

        return $this;
    }
}
