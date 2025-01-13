<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $comment = null;

    /**
     * @var Collection<int, Series>
     */
    #[ORM\OneToMany(targetEntity: Series::class, mappedBy: 'avis')]
    private Collection $series;

    /**
     * @var Collection<int, Films>
     */
    #[ORM\OneToMany(targetEntity: Films::class, mappedBy: 'avis')]
    private Collection $films;

    public function __construct()
    {
        $this->series = new ArrayCollection();
        $this->films = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return Collection<int, Series>
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Series $series): static
    {
        if (!$this->series->contains($series)) {
            $this->series->add($series);
            $series->setAvis($this);
        }

        return $this;
    }

    public function removeSeries(Series $series): static
    {
        if ($this->series->removeElement($series)) {
            // set the owning side to null (unless already changed)
            if ($series->getAvis() === $this) {
                $series->setAvis(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Films>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Films $film): static
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->setAvis($this);
        }

        return $this;
    }

    public function removeFilm(Films $film): static
    {
        if ($this->films->removeElement($film)) {
            // set the owning side to null (unless already changed)
            if ($film->getAvis() === $this) {
                $film->setAvis(null);
            }
        }

        return $this;
    }
}
