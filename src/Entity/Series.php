<?php

namespace App\Entity;

use App\Repository\SeriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    
    #[ORM\Column(type: Types::TEXT)]
    private ?string $summarize = null;

    #[ORM\Column]
    private ?int $nbrepisodes = null;

    #[ORM\Column]
    private ?int $nbrseasons = null;

    #[ORM\ManyToOne(inversedBy: 'series')]
    private ?Avis $avis = null;

    #[ORM\ManyToOne(inversedBy: 'series')]
    private ?Genre $genre = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'serie')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

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

    public function getSummarize(): ?string
    {
        return $this->summarize;
    }

    public function setSummarize(string $summarize): static
    {
        $this->summarize = $summarize;

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

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setSerie($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getSerie() === $this) {
                $user->setSerie(null);
            }
        }

        return $this;
    }

    
}
