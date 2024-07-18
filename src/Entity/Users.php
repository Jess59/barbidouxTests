<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['mailUser'], message: 'There is already an account with this mailUser')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $mailUser = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 30)]
    private ?string $lastnameUser = null;

    #[ORM\Column(length: 30)]
    private ?string $nameUser = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $nName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthUser;

    #[ORM\ManyToMany(targetEntity: Reservation::class, mappedBy: 'users')]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }
//on va tester de changer en not null
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getmailUser(): ?string
    {
        return $this->mailUser;
    }

    public function setmailUser(string $mailUser): static
    {
        $this->mailUser = $mailUser;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->mailUser;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->mailUser;
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

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastnameUser(): ?string
    {
        return $this->lastnameUser;
    }

    public function setLastnameUser(string $lastnameUser): static
    {
        $this->lastnameUser = $lastnameUser;

        return $this;
    }

    public function getNameUser(): ?string
    {
        return $this->nameUser;
    }

    public function setNameUser(string $nameUser): static
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    public function getNName(): ?string
    {
        return $this->nName;
    }

    public function setNName(?string $nName): static
    {
        $this->nName = $nName;

        return $this;
    }

    public function getBirthUser(): ?\DateTimeInterface
    {
        return $this->birthUser;
    }

    public function setBirthUser(\DateTimeInterface $birthUser): static
    {
        $this->birthUser = $birthUser;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->addUser($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeUser($this);
        }

        return $this;
    }
}
