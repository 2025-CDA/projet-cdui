<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiResource;
use App\Enum\Gender;
use App\Repository\InfoFormInternRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: InfoFormInternRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'info_form_intern:read']),
        new GetCollection(normalizationContext: ['groups' => 'info_form_intern:read'])
    ]
)]

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
    private ?Gender $gender = null;


    #[Groups(['info_form_intern:read'])] // <-- This is the key!
    public function getFirstName(): ?string
    {
        return $this->infoForm?->getInternMember()?->getUser()?->getFirstName();
    }

    #[Groups(['info_form_intern:read'])] // <-- Expose this too.
    public function getLastName(): ?string
    {
        return $this->infoForm?->getInternMember()?->getUser()?->getLastName();
    }

//    #[Groups(['info_form_intern:read'])] // <-- Expose this too.
//    public function getFullName(): ?string
//    {
//        $firstname = $this->infoForm?->getInternMember()?->getUser()?->getFirstName();
//        $lastname = $this->infoForm?->getInternMember()?->getUser()?->getLastName();
//        return $firstname && $lastname ? "$firstname $lastname" : null;
//    }
//
// TODO:
// - email
// - offerNumber
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
