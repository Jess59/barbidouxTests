<?php

namespace App\Entity;

use App\Repository\HikeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: HikeRepository::class)]
#[Broadcast]
class Hike
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameHike = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descHike = null;

    #[ORM\OneToMany(mappedBy: 'hikeId', targetEntity: Reservation::class, orphanRemoval: true)]
    private Collection $reservations;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $cityHike = null;

    #[ORM\Column(nullable: true)]
    private ?float $timeHike = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $distHike = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $heightHike = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $downHike = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $difficultyHike = null;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameHike(): ?string
    {
        return $this->nameHike;
    }

    public function setNameHike(string $nameHike): static
    {
        $this->nameHike = $nameHike;

        return $this;
    }

    public function getDescHike(): ?string
    {
        return $this->descHike;
    }

    public function setDescHike(?string $descHike): static
    {
        $this->descHike = $descHike;

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
            $reservation->setHikeId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getHikeId() === $this) {
                $reservation->setHikeId(null);
            }
        }

        return $this;
    }

    public function getCityHike(): ?string
    {
        return $this->cityHike;
    }

    public function setCityHike(?string $cityHike): static
    {
        $this->cityHike = $cityHike;

        return $this;
    }

    public function getTimeHike(): ?float
    {
        return $this->timeHike;
    }

    public function setTimeHike(?float $timeHike): static
    {
        $this->timeHike = $timeHike;

        return $this;
    }

    public function getDistHike(): ?string
    {
        return $this->distHike;
    }

    public function setDistHike(?string $distHike): static
    {
        $this->distHike = $distHike;

        return $this;
    }

    public function getHeightHike(): ?string
    {
        return $this->heightHike;
    }

    public function setHeightHike(?string $heightHike): static
    {
        $this->heightHike = $heightHike;

        return $this;
    }

    public function getDownHike(): ?string
    {
        return $this->downHike;
    }

    public function setDownHike(?string $downHike): static
    {
        $this->downHike = $downHike;

        return $this;
    }

    public function getDifficultyHike(): ?string
    {
        return $this->difficultyHike;
    }

    public function setDifficultyHike(?string $difficultyHike): static
    {
        $this->difficultyHike = $difficultyHike;

        return $this;
    }
}