<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    // #[ORM\Column(length: 255)]
    // private ?string $clubAssocie = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateDemande = null;

    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'demandes')]
    private Collection $clubAssocie;

    public function __construct()
    {
        $this->clubAssocie = new ArrayCollection();
    }

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

    // public function getClubAssocie(): ?string
    // {
    //     return $this->clubAssocie;
    // }

    // public function setClubAssocie(string $clubAssocie): static
    // {
    //     $this->clubAssocie = $clubAssocie;

    //     return $this;
    // }

    public function getDateDemande(): ?\DateTimeImmutable
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeImmutable $dateDemande): static
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getClubAssocie(): Collection
    {
        return $this->clubAssocie;
    }

    public function addClubAssocie(Club $clubAssocie): static
    {
        if (!$this->clubAssocie->contains($clubAssocie)) {
            $this->clubAssocie->add($clubAssocie);
        }

        return $this;
    }

    public function removeClubAssocie(Club $clubAssocie): static
    {
        $this->clubAssocie->removeElement($clubAssocie);

        return $this;
    }
}
