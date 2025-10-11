<?php

namespace App\Entity;

use App\Enum\Gender;
use App\Enum\WorkLocation;
use App\Repository\InfoFormCompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: InfoFormCompanyRepository::class)]
#[ApiResource]
class InfoFormCompany
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fax = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $activity = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $activityDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stamp = null;

    #[ORM\Column(nullable: true, enumType: Gender::class)]
    private ?Gender $legalRepresentativeGender = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $legalRepresentativeLastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $legalRepresentativeFirstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $legalRepresentativeSignature = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $legalRepresentativeEmail = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $interviewStartDateTime = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $interviewEndDateTime = null;

    #[ORM\Column(nullable: true)]
    private ?bool $agreeTerms = null;

    #[ORM\Column(nullable: true, enumType: WorkLocation::class)]
    private ?WorkLocation $workLocation = null;

    #[ORM\Column(nullable: true, enumType: Gender::class)]
    private ?Gender $tutorGender = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tutorFirstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tutorLastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tutorEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tutorPhoneNumber = null;

    #[ORM\OneToOne(mappedBy: 'infoFormCompany', cascade: ['persist', 'remove'])]
    private ?InfoForm $infoForm = null;

    /**
     * @var Collection<int, InfoFormCompanyCalendarRow>
     */
    #[ORM\OneToMany(targetEntity: InfoFormCompanyCalendarRow::class, mappedBy: 'infoFormCompany')]
    private Collection $infoFormCompanyCalendarRow;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

// TODO:
// - companyName
// - address
// - email
// - contactName
//

    public function __construct()
    {
        $this->infoFormCompanyCalendarRow = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(?string $activity): static
    {
        $this->activity = $activity;

        return $this;
    }

    public function getActivityDescription(): ?string
    {
        return $this->activityDescription;
    }

    public function setActivityDescription(?string $activityDescription): static
    {
        $this->activityDescription = $activityDescription;

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

    public function getLegalRepresentativeGender(): ?Gender
    {
        return $this->legalRepresentativeGender;
    }

    public function setLegalRepresentativeGender(?Gender $legalRepresentativeGender): static
    {
        $this->legalRepresentativeGender = $legalRepresentativeGender;

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

    public function getLegalRepresentativeSignature(): ?string
    {
        return $this->legalRepresentativeSignature;
    }

    public function setLegalRepresentativeSignature(?string $legalRepresentativeSignature): static
    {
        $this->legalRepresentativeSignature = $legalRepresentativeSignature;

        return $this;
    }

    public function getLegalRepresentativeEmail(): ?string
    {
        return $this->legalRepresentativeEmail;
    }

    public function setLegalRepresentativeEmail(?string $legalRepresentativeEmail): static
    {
        $this->legalRepresentativeEmail = $legalRepresentativeEmail;

        return $this;
    }

    public function getInterviewStartDateTime(): ?\DateTimeImmutable
    {
        return $this->interviewStartDateTime;
    }

    public function setInterviewStartDateTime(\DateTimeImmutable $interviewStartDateTime): static
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

    public function getWorkLocation(): ?WorkLocation
    {
        return $this->workLocation;
    }

    public function setWorkLocation(?WorkLocation $workLocation): static
    {
        $this->workLocation = $workLocation;

        return $this;
    }

    public function getTutorGender(): ?Gender
    {
        return $this->tutorGender;
    }

    public function setTutorGender(?Gender $tutorGender): static
    {
        $this->tutorGender = $tutorGender;

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

    public function getTutorLastName(): ?string
    {
        return $this->tutorLastName;
    }

    public function setTutorLastName(?string $tutorLastName): static
    {
        $this->tutorLastName = $tutorLastName;

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

    public function getInfoForm(): ?InfoForm
    {
        return $this->infoForm;
    }

    public function setInfoForm(?InfoForm $infoForm): static
    {
        // unset the owning side of the relation if necessary
        if ($infoForm === null && $this->infoForm !== null) {
            $this->infoForm->setInfoFormCompany(null);
        }

        // set the owning side of the relation if necessary
        if ($infoForm !== null && $infoForm->getInfoFormCompany() !== $this) {
            $infoForm->setInfoFormCompany($this);
        }

        $this->infoForm = $infoForm;

        return $this;
    }

    /**
     * @return Collection<int, InfoFormCompanyCalendarRow>
     */
    public function getInfoFormCompanyCalendarRow(): Collection
    {
        return $this->infoFormCompanyCalendarRow;
    }

    public function addInfoFormCompanyCalendarRow(InfoFormCompanyCalendarRow $infoFormCompanyCalendarRow): static
    {
        if (!$this->infoFormCompanyCalendarRow->contains($infoFormCompanyCalendarRow)) {
            $this->infoFormCompanyCalendarRow->add($infoFormCompanyCalendarRow);
            $infoFormCompanyCalendarRow->setInfoFormCompany($this);
        }

        return $this;
    }

    public function removeInfoFormCompanyCalendarRow(InfoFormCompanyCalendarRow $infoFormCompanyCalendarRow): static
    {
        // set the owning side to null (unless already changed)
        if ($this->infoFormCompanyCalendarRow->removeElement($infoFormCompanyCalendarRow) && $infoFormCompanyCalendarRow->getInfoFormCompany() === $this) {
            $infoFormCompanyCalendarRow->setInfoFormCompany(null);
        }

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
