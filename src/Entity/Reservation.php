<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $DateReservation = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Club $clubAssocie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeImmutable
    {
        return $this->DateReservation;
    }

    public function setDateReservation(\DateTimeImmutable $DateReservation): static
    {
        $this->DateReservation = $DateReservation;

        return $this;
    }

    public function getClubAssocie(): ?Club
    {
        return $this->clubAssocie;
    }

    public function setClubAssocie(?Club $clubAssocie): static
    {
        $this->clubAssocie = $clubAssocie;

        return $this;
    }
}
