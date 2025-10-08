<?php

namespace App\Entity;

use App\Enum\Gender;
use App\Enum\WorkLocation;
use App\Repository\InfoFormCompanyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoFormCompanyRepository::class)]
class InfoFormCompany
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $companyName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $activity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fax = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stamp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $legalRepresentativeLastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $legalRepresentativeFirstName = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $interviewStartDateTime = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $interviewEndDateTime = null;

    #[ORM\Column(nullable: true)]
    private ?bool $agreeTerms = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $legalRepresentativeSignature = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tutorLastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tutorFirstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tutorEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tutorPhoneNumber = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $activitiesCaption = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(?string $activity): static
    {
        $this->activity = $activity;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): static
    {
        $this->adress = $adress;

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

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): static
    {
        $this->fax = $fax;

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

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }

    public function getStamp(): ?string
    {
        return $this->stamp;
    }

    public function setStamp(?string $stamp): static
    {
        $this->stamp = $stamp;

        return $this;
    }

    public function getLegalRepresentativeLastName(): ?string
    {
        return $this->legalRepresentativeLastName;
    }

    public function setLegalRepresentativeLastName(?string $legalRepresentativeLastName): static
    {
        $this->legalRepresentativeLastName = $legalRepresentativeLastName;

        return $this;
    }

    public function getLegalRepresentativeFirstName(): ?string
    {
        return $this->legalRepresentativeFirstName;
    }

    public function setLegalRepresentativeFirstName(?string $legalRepresentativeFirstName): static
    {
        $this->legalRepresentativeFirstName = $legalRepresentativeFirstName;

        return $this;
    }

    public function getInterviewStartDateTime(): ?\DateTimeImmutable
    {
        return $this->interviewStartDateTime;
    }

    public function setInterviewStartDateTime(?\DateTimeImmutable $interviewStartDateTime): static
    {
        $this->interviewStartDateTime = $interviewStartDateTime;

        return $this;
    }

    public function getInterviewEndDateTime(): ?\DateTimeImmutable
    {
        return $this->interviewEndDateTime;
    }

    public function setInterviewEndDateTime(?\DateTimeImmutable $interviewEndDateTime): static
    {
        $this->interviewEndDateTime = $interviewEndDateTime;

        return $this;
    }


    public function isAgreeTerms(): ?bool
    {
        return $this->agreeTerms;
    }

    public function setAgreeTerms(?bool $agreeTerms): static
    {
        $this->agreeTerms = $agreeTerms;

        return $this;
    }

    public function getLegalRepresentativeSignature(): ?string
    {
        return $this->legalRepresentativeSignature;
    }

    public function setLegalRepresentativeSignature(?string $legalRepresentativeSignature): static
    {
        $this->legalRepresentativeSignature = $legalRepresentativeSignature;

        return $this;
    }

    public function getTutorLastName(): ?string
    {
        return $this->tutorLastName;
    }

    public function setTutorLastName(?string $tutorLastName): static
    {
        $this->tutorLastName = $tutorLastName;

        return $this;
    }

    public function getTutorFirstName(): ?string
    {
        return $this->tutorFirstName;
    }

    public function setTutorFirstName(?string $tutorFirstName): static
    {
        $this->tutorFirstName = $tutorFirstName;

        return $this;
    }

    public function getTutorEmail(): ?string
    {
        return $this->tutorEmail;
    }

    public function setTutorEmail(?string $tutorEmail): static
    {
        $this->tutorEmail = $tutorEmail;

        return $this;
    }

    public function getTutorPhoneNumber(): ?string
    {
        return $this->tutorPhoneNumber;
    }

    public function setTutorPhoneNumber(?string $tutorPhoneNumber): static
    {
        $this->tutorPhoneNumber = $tutorPhoneNumber;

        return $this;
    }

    public function getActivitiesCaption(): ?string
    {
        return $this->activitiesCaption;
    }

    public function setActivitiesCaption(?string $activitiesCaption): static
    {
        $this->activitiesCaption = $activitiesCaption;

        return $this;
    }
}
