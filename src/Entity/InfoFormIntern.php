<?php

namespace App\Entity;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Enum\Gender;
use App\Repository\InfoFormInternRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: InfoFormInternRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'info_form_intern:read'],
)]
#[GetCollection]
#[Post]
#[Get]
#[Delete]
#[Patch]
class InfoFormIntern
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['info_form_intern:read'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateStart = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateEnd = null;

    #[ORM\OneToOne(mappedBy: 'infoFormIntern', cascade: ['persist', 'remove'])]
    private ?InfoForm $infoForm = null;

    #[ORM\Column(nullable: true, enumType: Gender::class)]
    #[Groups(['info_form_intern:read'])]
    private ?Gender $gender = null;

    #[Groups(['info_form_intern:read'])]
    public function getFirstName(): ?string
    {
        return $this->infoForm?->getInternMember()?->getUser()?->getFirstName();
    }

    #[Groups(['info_form_intern:read'])]
    public function getLastName(): ?string
    {
        return $this->infoForm?->getInternMember()?->getUser()?->getLastName();
    }

    #[Groups(['info_form_intern:read'])]
    public function getFullName(): ?string
    {
        $firstname = $this->infoForm?->getInternMember()?->getUser()?->getFirstName();
        $lastname = $this->infoForm?->getInternMember()?->getUser()?->getLastName();
        return $firstname && $lastname ? "$firstname $lastname" : null;
    }

    #[Groups(['info_form_intern:read'])]
    public function getEmail(): ?string
    {
        return $this->infoForm?->getInternMember()?->getUser()?->getEmail();
    }

    #[Groups(['info_form_intern:read'])]
    public function getOfferNumber(): ?string
    {
        return $this->infoForm?->getInternMember()?->getTrainingSession()->first()?->getOfferNumber();
    }

    #[Groups(['info_form_intern:read'])]
    public function getTrainingSessionName(): ?string
    {
        return $this->infoForm?->getInternMember()?->getTrainingSession()->first()?->getTraining()?->getName();
    }

    #[Groups(['info_form_intern:read'])]
    public function getTrainingSessionTrainer(): ?string
    {
        return $this->infoForm?->getInternMember()?->getTrainingSession()->first()?->getOrganizationMembers()->first()?->getUser()?->getFullName();
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
}
