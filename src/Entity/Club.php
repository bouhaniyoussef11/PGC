<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $datecreation = null;

    // #[ORM\Column(length: 255)]
    // private ?string $datecreation = null;

    #[ORM\ManyToOne(inversedBy: 'Responsable')]
    private ?User $responsable = null;

    #[ORM\OneToMany(mappedBy: 'clubAssocie', targetEntity: Reservation::class)]
    private Collection $reservations;

    #[ORM\ManyToMany(targetEntity: Demande::class, mappedBy: 'clubAssocie')]
    private Collection $demandes;

    // #[ORM\OneToMany(mappedBy: 'auteur', targetEntity: Annonce::class)]
    // private Collection $annonces;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        // $this->annonces = new ArrayCollection();
        $this->demandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    // public function getDatecreation(): ?string
    // {
    //     return $this->datecreation;
    // }

    // public function setDatecreation(string $datecreation): static
    // {
    //     $this->datecreation = $datecreation;

    //     return $this;
    // }
    public function getDatecreation(): ?\DateTimeImmutable
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeImmutable $datecreation): static
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getResponsable(): ?User
    {
        return $this->responsable;
    }

    public function setResponsable(?User $responsable): static
    {
        $this->responsable = $responsable;

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
            $reservation->setClubAssocie($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getClubAssocie() === $this) {
                $reservation->setClubAssocie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    // public function getAnnonces(): Collection
    // {
    //     return $this->annonces;
    // }

    // public function addAnnonce(Annonce $annonce): static
    // {
    //     if (!$this->annonces->contains($annonce)) {
    //         $this->annonces->add($annonce);
    //         $annonce->setAuteur($this);
    //     }

    //     return $this;
    // }

    // public function removeAnnonce(Annonce $annonce): static
    // {
    //     if ($this->annonces->removeElement($annonce)) {
    //         // set the owning side to null (unless already changed)
    //         if ($annonce->getAuteur() === $this) {
    //             $annonce->setAuteur(null);
    //         }
    //     }

    //     return $this;
    // }
    
    public function __toString()
    {
        return $this->getNom(); 
    }

    /**
     * @return Collection<int, Demande>
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demande $demande): static
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes->add($demande);
            $demande->addClubAssocie($this);
        }

        return $this;
    }

    public function removeDemande(Demande $demande): static
    {
        if ($this->demandes->removeElement($demande)) {
            $demande->removeClubAssocie($this);
        }

        return $this;
    }
}
