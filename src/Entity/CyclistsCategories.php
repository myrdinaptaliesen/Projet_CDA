<?php

namespace App\Entity;

use App\Repository\CyclistsCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CyclistsCategoriesRepository::class)]
class CyclistsCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameCylistsCategory;

    #[ORM\ManyToMany(targetEntity: Races::class, mappedBy: 'cyclistsCategories')]
    private $races;

    public function __construct()
    {
        $this->races = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCylistsCategory(): ?string
    {
        return $this->nameCylistsCategory;
    }

    public function setNameCylistsCategory(string $nameCylistsCategory): self
    {
        $this->nameCylistsCategory = $nameCylistsCategory;

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
            $race->addCyclistsCategory($this);
        }

        return $this;
    }

    public function removeRace(Races $race): self
    {
        if ($this->races->removeElement($race)) {
            $race->removeCyclistsCategory($this);
        }

        return $this;
    }
}
