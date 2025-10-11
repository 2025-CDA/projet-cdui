<?php

namespace App\Entity;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;


#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
#[ApiResource(order: ['id' => 'ASC'])]
#[Get(normalizationContext: ['groups' => ['read:user']])]
#[GetCollection(
    normalizationContext: ['groups' => ['read:user_collection']],
//    forceEager: false,
)]
#[Post(denormalizationContext: ['groups' => ['create:user']])]
#[Patch(denormalizationContext: ['groups' => ['update:user']])]
#[Delete]
class User implements UserInterface, PasswordAuthenticatedUserInterface
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
    #[Groups([
        'read:user',
        'read:user_collection'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private ?string $lastName = null;

    #[Groups([
        'read:user',
        'read:user_collection'
    ])]
    public function getFullName(): ?string
    {
        return $this->lastName . ' ' . $this->firstName;
    }

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private ?string $login = null;

    #[ORM\OneToOne(inversedBy: 'user', cascade: ['persist', 'remove'])]
    #[MaxDepth(1)]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private ?CompanyMember $companyMember = null;

    #[ORM\OneToOne(inversedBy: 'user', cascade: ['persist', 'remove'])]
    #[MaxDepth(1)]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private ?OrganizationMember $organizationMember = null;

    #[ORM\OneToOne(inversedBy: 'user', cascade: ['persist', 'remove'])]
    #[MaxDepth(1)]
    #[Groups([
        'read:user',
        'read:user_collection',
        'create:user',
        'update:user'
    ])]
    private ?InternMember $internMember = null;

    #[ORM\Column(nullable: true)]
    #[Groups([
        'read:user',
        'read:user_collection'
    ])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups([
        'read:user',
        'read:user_collection'
    ])]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0".self::class."\0password"] = hash('crc32c', $this->password);

        return $data;
    }

    #[\Deprecated]
    public function eraseCredentials(): void
    {
        // @deprecated, to be removed when upgrading to Symfony 8
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getCompanyMember(): ?CompanyMember
    {
        return $this->companyMember;
    }

    public function setCompanyMember(?CompanyMember $companyMember): static
    {
        $this->companyMember = $companyMember;

        return $this;
    }

    public function getOrganizationMember(): ?OrganizationMember
    {
        return $this->organizationMember;
    }

    public function setOrganizationMember(?OrganizationMember $organizationMember): static
    {
        $this->organizationMember = $organizationMember;

        return $this;
    }

    public function getInternMember(): ?InternMember
    {
        return $this->internMember;
    }

    public function setInternMember(?InternMember $internMember): static
    {
        $this->internMember = $internMember;

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
