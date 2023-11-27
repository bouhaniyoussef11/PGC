<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Expr\Cast\String_;
use PhpParser\Node\Scalar\MagicConst\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string  $contenu = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    private ?User $autheur = null;

    // #[ORM\ManyToOne(inversedBy: 'annonces')]
    // private ?Club $auteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu():?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    // public function getAuteur(): ?Club
    // {
    //     return $this->auteur;
    // }

    // public function setAuteur(?Club $auteur): static
    // {
    //     $this->auteur = $auteur;

    //     return $this;
    // }

    public function getAutheur(): ?User
    {
        return $this->autheur;
    }

    public function setAutheur(?User $autheur): static
    {
        $this->autheur = $autheur;

        return $this;
    }
}
