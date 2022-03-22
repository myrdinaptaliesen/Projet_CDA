<?php

namespace App\Entity;

use App\Repository\DisciplinesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinesRepository::class)]
class Disciplines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameDiscipline;

    #[ORM\OneToMany(mappedBy: 'discipline', targetEntity: Races::class)]
    private $races;

    public function __construct()
    {
        $this->races = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDiscipline(): ?string
    {
        return $this->nameDiscipline;
    }

    public function setNameDiscipline(string $nameDiscipline): self
    {
        $this->nameDiscipline = $nameDiscipline;

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
            $race->setDiscipline($this);
        }

        return $this;
    }

    public function removeRace(Races $race): self
    {
        if ($this->races->removeElement($race)) {
            // set the owning side to null (unless already changed)
            if ($race->getDiscipline() === $this) {
                $race->setDiscipline(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nameDiscipline;
    }
}
