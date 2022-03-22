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

    #[ORM\Column(type: 'datetime_immutable')]
    private $startDateRace;

    #[ORM\Column(type: 'date')]
    private $endDateRace;

    #[ORM\Column(type: 'string', length: 255)]
    private $distanceRace;

    #[ORM\Column(type: 'float', nullable:true)]
    private $distanceCircuit;

    #[ORM\Column(type: 'float')]
    private $commitmentFeeRace;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable',nullable:true)]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: Cities::class, inversedBy: 'races')]
    #[ORM\JoinColumn(nullable:false)]
    private $city;

    #[ORM\ManyToOne(targetEntity: Clubs::class, inversedBy: 'races')]
    #[ORM\JoinColumn(nullable:false)]
    private $club;

    #[ORM\ManyToMany(targetEntity: CyclistsCategories::class, inversedBy: 'races')]
    #[ORM\InverseJoinColumn(nullable:false)]
    #[ORM\JoinColumn(nullable:false)]
    private $cyclistsCategories;

    #[ORM\Column(type: 'string', length: 255)]
    private $departureAdress;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $organizationalDetails;

    #[ORM\Column(type: 'string', length: 255)]
    private $titleRace;

    #[ORM\ManyToOne(targetEntity: Disciplines::class, inversedBy: 'races')]
    #[ORM\JoinColumn(nullable: false)]
    private $discipline;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $informationsRace;


    public function __construct()
    {
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

    public function getDepartureAdress(): ?string
    {
        return $this->departureAdress;
    }

    public function setDepartureAdress(string $departureAdress): self
    {
        $this->departureAdress = $departureAdress;

        return $this;
    }

    public function getOrganizationalDetails(): ?string
    {
        return $this->organizationalDetails;
    }

    public function setOrganizationalDetails(?string $organizationalDetails): self
    {
        $this->organizationalDetails = $organizationalDetails;

        return $this;
    }

    public function getTitleRace(): ?string
    {
        return $this->titleRace;
    }

    public function setTitleRace(string $titleRace): self
    {
        $this->titleRace = $titleRace;

        return $this;
    }

    public function getDiscipline(): ?Disciplines
    {
        return $this->discipline;
    }

    public function setDiscipline(?Disciplines $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getInformationsRace(): ?string
    {
        return $this->informationsRace;
    }

    public function setInformationsRace(?string $informationsRace): self
    {
        $this->informationsRace = $informationsRace;

        return $this;
    }

    
}
