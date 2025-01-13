<?php

namespace App\Entity;

use App\Repository\SeriesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeriesRepository::class)]
class Series
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $autor = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $summarize = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column]
    private ?int $nbrepisodes = null;

    #[ORM\Column]
    private ?int $nbrseasons = null;

    #[ORM\ManyToOne(inversedBy: 'series')]
    private ?Genre $genres = null;

    #[ORM\ManyToOne(inversedBy: 'series')]
    private ?Avis $avis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): static
    {
        $this->autor = $autor;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getSummarize(): ?string
    {
        return $this->summarize;
    }

    public function setSummarize(string $summarize): static
    {
        $this->summarize = $summarize;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getNbrepisodes(): ?int
    {
        return $this->nbrepisodes;
    }

    public function setNbrepisodes(int $nbrepisodes): static
    {
        $this->nbrepisodes = $nbrepisodes;

        return $this;
    }

    public function getNbrseasons(): ?int
    {
        return $this->nbrseasons;
    }

    public function setNbrseasons(int $nbrseasons): static
    {
        $this->nbrseasons = $nbrseasons;

        return $this;
    }

    public function getAvis(): ?Avis
    {
        return $this->avis;
    }

    public function setAvis(?Avis $avis): static
    {
        $this->avis = $avis;

        return $this;
    }

    
}
