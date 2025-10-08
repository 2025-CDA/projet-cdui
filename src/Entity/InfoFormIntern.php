<?php

namespace App\Entity;

use App\Enum\EnumGender;
use App\Enum\Gender;
use App\Repository\InfoFormInternRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoFormInternRepository::class)]
class InfoFormIntern
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $offerNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $idConnexion = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\OneToOne(mappedBy: 'infoFormIntern', cascade: ['persist', 'remove'])]
    private ?InfoForm $infoForm = null;

    #[ORM\OneToOne(inversedBy: 'infoFormIntern', cascade: ['persist', 'remove'])]
    private ?InfoFormInternCompany $infoFormInternCompany = null;

    #[ORM\OneToOne(inversedBy: 'infoFormIntern', cascade: ['persist', 'remove'])]
    private ?TrainingCourseSession $trainingCourseSession = null;

    #[ORM\Column(nullable: true, enumType: EnumGender::class)]
    private ?EnumGender $gender = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getOfferNumber(): ?string
    {
        return $this->offerNumber;
    }

    public function setOfferNumber(?string $offerNumber): static
    {
        $this->offerNumber = $offerNumber;

        return $this;
    }

    public function getIdConnexion(): ?string
    {
        return $this->idConnexion;
    }

    public function setIdConnexion(?string $idConnexion): static
    {
        $this->idConnexion = $idConnexion;

        return $this;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

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

    public function getInfoFormInternCompany(): ?InfoFormInternCompany
    {
        return $this->infoFormInternCompany;
    }

    public function setInfoFormInternCompany(?InfoFormInternCompany $infoFormInternCompany): static
    {
        $this->infoFormInternCompany = $infoFormInternCompany;

        return $this;
    }

    public function getTrainingCourseSession(): ?TrainingCourseSession
    {
        return $this->trainingCourseSession;
    }

    public function setTrainingCourseSession(?TrainingCourseSession $trainingCourseSession): static
    {
        $this->trainingCourseSession = $trainingCourseSession;

        return $this;
    }

    public function getGender(): ?EnumGender
    {
        return $this->gender;
    }

    public function setGender(?EnumGender $gender): static
    {
        $this->gender = $gender;

        return $this;
    }
}
