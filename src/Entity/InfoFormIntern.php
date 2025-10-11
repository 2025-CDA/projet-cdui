<?php

namespace App\Entity;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Enum\Gender;
use App\Enum\OrganizationRole;
use App\Repository\InfoFormInternRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: InfoFormInternRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
//    order: ['createdAt' => 'DESC']
)]
#[Get(
    normalizationContext: ['groups' => ['read:item']]
)]
#[GetCollection(
    normalizationContext: ['groups' => ['read:collection']]
)]
#[Post(
    denormalizationContext: ['groups' => ['create:item']]
)]
#[Patch(
    denormalizationContext: ['groups' => ['update:item']]
)]
#[Delete]
class InfoFormIntern
{
    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        // Set the createdAt and updatedAt values on initial creation
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        // Set the updatedAt value on every update
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:item', 'read:collection'])]
    private ?int $id = null;

    #[Groups(['read:item', 'read:collection'])]
    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateStart = null;

    #[Groups(['read:item', 'read:collection'])]
    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateEnd = null;

    #[Groups(['read:item'])]
    #[ORM\OneToOne(mappedBy: 'infoFormIntern', cascade: ['persist', 'remove'])]
    private ?InfoForm $infoForm = null;

    #[ORM\Column(nullable: true, enumType: Gender::class)]
    #[Groups(['read:item', 'read:collection'])]
    private ?Gender $gender = null;

    #[ORM\OneToOne(inversedBy: 'infoFormIntern', cascade: ['persist', 'remove'])]
    private ?InfoFormInternCompany $infoFormInternCompany = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read:item'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read:item'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[Groups(['read:item'])]
    public function getFirstName(): ?string
    {
        return $this->infoForm?->getInternMember()?->getUser()?->getFirstName();
    }

    #[Groups(['read:item'])]
    public function getLastName(): ?string
    {
        return $this->infoForm?->getInternMember()?->getUser()?->getLastName();
    }

    #[Groups(['read:item', 'read:collection'])]
    public function getFullName(): ?string
    {
        $firstname = $this->infoForm?->getInternMember()?->getUser()?->getFirstName();
        $lastname = $this->infoForm?->getInternMember()?->getUser()?->getLastName();
        return $firstname && $lastname ? "$firstname $lastname" : null;
    }

    #[Groups(['read:item', 'read:collection'])]
    public function getEmail(): ?string
    {
        return $this->infoForm?->getInternMember()?->getUser()?->getEmail();
    }

    #[Groups(['read:item'])]
    public function getOfferNumber(): ?string
    {
        return $this->infoForm?->getInternMember()?->getTrainingSession()->first()?->getOfferNumber();
    }

    #[Groups(['read:item'])]
    public function getTrainingSessionName(): ?string
    {
        return $this->infoForm?->getInternMember()?->getTrainingSession()->first()?->getTraining()?->getName();
    }

    #[Groups(['read:item'])]
    public function getTrainers(): ?array
    {
        $organizationMembers = $this->infoForm?->getInternMember()?->getTrainingSession()?->first()?->getOrganizationMembers();

        if (!$organizationMembers instanceof Collection) {
            return [];
        }

        $trainerNames = [];
        foreach ($organizationMembers as $member) {
            if ($member->getRole() === OrganizationRole::TRAINER) {
                $trainerNames[] = $member->getUser()?->getFullName();
            }
        }

        return $trainerNames;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeImmutable
    {
        return $this->dateStart;
    }

    public function setDateStart(?\DateTimeImmutable $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeImmutable
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?\DateTimeImmutable $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getInfoForm(): ?InfoForm
    {
        return $this->infoForm;
    }

    public function setInfoForm(?InfoForm $infoForm): static
    {
        // unset the owning side of the relation if necessary
        if ($infoForm === null && $this->infoForm !== null) {
            $this->infoForm->setInfoFormIntern(null);
        }

        // set the owning side of the relation if necessary
        if ($infoForm !== null && $infoForm->getInfoFormIntern() !== $this) {
            $infoForm->setInfoFormIntern($this);
        }

        $this->infoForm = $infoForm;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getInfoFormInternCompany(): ?InfoFormInternCompany
    {
        return $this->infoFormInternCompany;
    }

    public function setInfoFormInternCompany(?InfoFormInternCompany $infoFormInternCompany): static
    {
        $this->infoFormInternCompany = $infoFormInternCompany;

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
