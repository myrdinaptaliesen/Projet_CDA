<?php

namespace App\Entity;

use App\Repository\CitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitiesRepository::class)]
class Cities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameCity;

    #[ORM\Column(type: 'string', length: 255)]
    private $postalCodeCity;

    #[ORM\Column(type: 'decimal', precision: 8, scale: 6)]
    private $lonCity;

    #[ORM\Column(type: 'decimal', precision: 8, scale: 6)]
    private $latCity;

    #[ORM\ManyToOne(targetEntity: Departements::class, inversedBy: 'cities')]
    private $departement;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: Races::class)]
    private $races;

    public function __construct()
    {
        $this->races = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCity(): ?string
    {
        return $this->nameCity;
    }

    public function setNameCity(string $nameCity): self
    {
        $this->nameCity = $nameCity;

        return $this;
    }

    public function getPostalCodeCity(): ?string
    {
        return $this->postalCodeCity;
    }

    public function setPostalCodeCity(string $postalCodeCity): self
    {
        $this->postalCodeCity = $postalCodeCity;

        return $this;
    }

    public function getLonCity(): ?string
    {
        return $this->lonCity;
    }

    public function setLonCity(string $lonCity): self
    {
        $this->lonCity = $lonCity;

        return $this;
    }

    public function getLatCity(): ?string
    {
        return $this->latCity;
    }

    public function setLatCity(string $latCity): self
    {
        $this->latCity = $latCity;

        return $this;
    }

    public function getDepartement(): ?Departements
    {
        return $this->departement;
    }

    public function setDepartement(?Departements $departement): self
    {
        $this->departement = $departement;

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
            $race->setCity($this);
        }

        return $this;
    }

    public function removeRace(Races $race): self
    {
        if ($this->races->removeElement($race)) {
            // set the owning side to null (unless already changed)
            if ($race->getCity() === $this) {
                $race->setCity(null);
            }
        }

        return $this;
    }
}
