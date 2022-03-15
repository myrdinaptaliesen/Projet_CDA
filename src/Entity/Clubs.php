<?php

namespace App\Entity;

use App\Repository\ClubsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubsRepository::class)]
class Clubs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameClub;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $logoClub;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Races::class)]
    private $races;

    public function __construct()
    {
        $this->races = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameClub(): ?string
    {
        return $this->nameClub;
    }

    public function setNameClub(string $nameClub): self
    {
        $this->nameClub = $nameClub;

        return $this;
    }

    public function getLogoClub(): ?string
    {
        return $this->logoClub;
    }

    public function setLogoClub(?string $logoClub): self
    {
        $this->logoClub = $logoClub;

        return $this;
    }

    /**
     * @return Collection<int, Races>
     */
    public function getRaces(): Collection
    {
        return $this->races;
    }

    public function addRace(Races $race): self
    {
        if (!$this->races->contains($race)) {
            $this->races[] = $race;
            $race->setClub($this);
        }

        return $this;
    }

    public function removeRace(Races $race): self
    {
        if ($this->races->removeElement($race)) {
            // set the owning side to null (unless already changed)
            if ($race->getClub() === $this) {
                $race->setClub(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nameClub;
    }
}
