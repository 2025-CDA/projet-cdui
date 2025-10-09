<?php

namespace App\Entity;

use App\Repository\InternRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InternRepository::class)]
class Intern
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'intern', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @var Collection<int, InfoForm>
     */
    #[ORM\OneToMany(targetEntity: InfoForm::class, mappedBy: 'intern')]
    private Collection $infoForm;

    public function __construct()
    {
        $this->infoForm = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setIntern(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getIntern() !== $this) {
            $user->setIntern($this);
        }

        $this->user = $user;

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
            $infoForm->setIntern($this);
        }

        return $this;
    }

    public function removeInfoForm(InfoForm $infoForm): static
    {
        if ($this->infoForm->removeElement($infoForm)) {
            // set the owning side to null (unless already changed)
            if ($infoForm->getIntern() === $this) {
                $infoForm->setIntern(null);
            }
        }

        return $this;
    }
}
