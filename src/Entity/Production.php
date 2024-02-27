<?php

namespace App\Entity;

use App\Repository\ProductionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductionRepository::class)]
class Production
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $Materials = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $Tuning = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $Note_Number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Price = null;

    #[ORM\ManyToOne(inversedBy: 'productions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getMaterials(): ?string
    {
        return $this->Materials;
    }

    public function setMaterials(string $Materials): static
    {
        $this->Materials = $Materials;

        return $this;
    }

    public function getTuning(): ?string
    {
        return $this->Tuning;
    }

    public function setTuning(string $Tuning): static
    {
        $this->Tuning = $Tuning;

        return $this;
    }

    public function getNoteNumber(): ?string
    {
        return $this->Note_Number;
    }

    public function setNoteNumber(string $Note_Number): static
    {
        $this->Note_Number = $Note_Number;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(?string $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }
}
