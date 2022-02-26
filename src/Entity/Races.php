<?php

namespace App\Entity;

use App\Repository\RacesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RacesRepository::class)]
class Races
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $startDateRace;

    #[ORM\Column(type: 'date')]
    private $endDateRace;

    #[ORM\Column(type: 'string', length: 255)]
    private $distanceRace;

    #[ORM\Column(type: 'float')]
    private $distanceCircuit;

    #[ORM\Column(type: 'float')]
    private $commitmentFeeRace;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private $updatedAt;

    #[ORM\OneToMany(mappedBy: 'race', targetEntity: Documents::class)]
    private $documents;

    #[ORM\ManyToOne(targetEntity: Cities::class, inversedBy: 'races')]
    private $city;

    #[ORM\ManyToOne(targetEntity: Clubs::class, inversedBy: 'races')]
    private $club;

    #[ORM\ManyToMany(targetEntity: CyclistsCategories::class, inversedBy: 'races')]
    private $cyclistsCategories;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->cyclistsCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDateRace(): ?\DateTimeInterface
    {
        return $this->startDateRace;
    }

    public function setStartDateRace(\DateTimeInterface $startDateRace): self
    {
        $this->startDateRace = $startDateRace;

        return $this;
    }

    public function getEndDateRace(): ?\DateTimeInterface
    {
        return $this->endDateRace;
    }

    public function setEndDateRace(\DateTimeInterface $endDateRace): self
    {
        $this->endDateRace = $endDateRace;

        return $this;
    }

    public function getDistanceRace(): ?string
    {
        return $this->distanceRace;
    }

    public function setDistanceRace(string $distanceRace): self
    {
        $this->distanceRace = $distanceRace;

        return $this;
    }

    public function getDistanceCircuit(): ?float
    {
        return $this->distanceCircuit;
    }

    public function setDistanceCircuit(float $distanceCircuit): self
    {
        $this->distanceCircuit = $distanceCircuit;

        return $this;
    }

    public function getCommitmentFeeRace(): ?float
    {
        return $this->commitmentFeeRace;
    }

    public function setCommitmentFeeRace(float $commitmentFeeRace): self
    {
        $this->commitmentFeeRace = $commitmentFeeRace;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Documents>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Documents $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setRace($this);
        }

        return $this;
    }

    public function removeDocument(Documents $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getRace() === $this) {
                $document->setRace(null);
            }
        }

        return $this;
    }

    public function getCity(): ?Cities
    {
        return $this->city;
    }

    public function setCity(?Cities $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getClub(): ?Clubs
    {
        return $this->club;
    }

    public function setClub(?Clubs $club): self
    {
        $this->club = $club;

        return $this;
    }

    /**
     * @return Collection<int, CyclistsCategories>
     */
    public function getCyclistsCategories(): Collection
    {
        return $this->cyclistsCategories;
    }

    public function addCyclistsCategory(CyclistsCategories $cyclistsCategory): self
    {
        if (!$this->cyclistsCategories->contains($cyclistsCategory)) {
            $this->cyclistsCategories[] = $cyclistsCategory;
        }

        return $this;
    }

    public function removeCyclistsCategory(CyclistsCategories $cyclistsCategory): self
    {
        $this->cyclistsCategories->removeElement($cyclistsCategory);

        return $this;
    }
}
