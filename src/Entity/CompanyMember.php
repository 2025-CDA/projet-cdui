<?php

namespace App\Entity;

use App\Enum\CompanyRole;
use App\Repository\CompanyMemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToOne(mappedBy: 'companyMember', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'companyMembers')]
    private ?Company $company = null;

    /**
     * @var Collection<int, InfoForm>
     */
    #[ORM\OneToMany(targetEntity: InfoForm::class, mappedBy: 'companyMember')]
    private Collection $infoForm;

    public function __construct()
    {
        $this->infoForm = new ArrayCollection();
    }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setCompanyMember(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getCompanyMember() !== $this) {
            $user->setCompanyMember($this);
        }

        $this->user = $user;

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

    /**
     * @return Collection<int, InfoForm>
     */
    public function getInfoForm(): Collection
    {
        return $this->infoForm;
    }

    public function addInfoForm(InfoForm $infoForm): static
    {
        if (!$this->infoForm->contains($infoForm)) {
            $this->infoForm->add($infoForm);
            $infoForm->setCompanyMember($this);
        }

        return $this;
    }

    public function removeInfoForm(InfoForm $infoForm): static
    {
        if ($this->infoForm->removeElement($infoForm)) {
            // set the owning side to null (unless already changed)
            if ($infoForm->getCompanyMember() === $this) {
                $infoForm->setCompanyMember(null);
            }
        }

        return $this;
    }
}
