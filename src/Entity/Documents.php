<?php

namespace App\Entity;

use App\Repository\DocumentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentsRepository::class)]
class Documents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameDocuments;

    #[ORM\ManyToOne(targetEntity: Races::class, inversedBy: 'documents')]
    private $race;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDocuments(): ?string
    {
        return $this->nameDocuments;
    }

    public function setNameDocuments(string $nameDocuments): self
    {
        $this->nameDocuments = $nameDocuments;

        return $this;
    }

    public function getRace(): ?Races
    {
        return $this->race;
    }

    public function setRace(?Races $race): self
    {
        $this->race = $race;

        return $this;
    }
}
