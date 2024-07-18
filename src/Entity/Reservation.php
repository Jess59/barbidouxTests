<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[Broadcast]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idResa = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dateHour = null;

    #[ORM\Column]
    private ?bool $isGroupe = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hike $hikeId = null;

    #[ORM\ManyToMany(targetEntity: Users::class, inversedBy: 'reservations')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdResa(): ?int
    {
        return $this->idResa;
    }

    public function setIdResa(int $idResa): static
    {
        $this->idResa = $idResa;

        return $this;
    }

    public function getDateHour(): ?string
    {
        return $this->dateHour;
    }

    public function setDateHour(?string $dateHour): static
    {
        $this->dateHour = $dateHour;

        return $this;
    }

    public function isIsGroupe(): ?bool
    {
        return $this->isGroupe;
    }

    public function setIsGroupe(bool $isGroupe): static
    {
        $this->isGroupe = $isGroupe;

        return $this;
    }

    public function getHikeId(): ?Hike
    {
        return $this->hikeId;
    }

    public function setHikeId(?Hike $hikeId): static
    {
        $this->hikeId = $hikeId;

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
        }

        return $this;
    }

    public function removeUser(Users $user): static
    {
        $this->users->removeElement($user);

        return $this;
    }
}
