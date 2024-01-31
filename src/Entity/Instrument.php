<?php

namespace App\Entity;

use App\Repository\InstrumentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstrumentRepository::class)]
class Instrument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Materials = null;

    #[ORM\Column(length: 255)]
    private ?string $Tuning = null;

    #[ORM\Column]
    private ?int $Note_Number = null;

    #[ORM\Column(length: 255)]
    private ?string $Picture = null;

    #[ORM\Column(length: 255)]
    private ?string $Price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Status = null;

    #[ORM\ManyToOne(inversedBy: 'Instrument')]
    private ?Rental $rental = null;

    #[ORM\ManyToOne(inversedBy: 'Instrument')]
    private ?Purchase $purchase = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
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

    public function getNoteNumber(): ?int
    {
        return $this->Note_Number;
    }

    public function setNoteNumber(int $Note_Number): static
    {
        $this->Note_Number = $Note_Number;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(string $Picture): static
    {
        $this->Picture = $Picture;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): static
    {
        $this->Status = $Status;

        return $this;
    }

    public function getRental(): ?Rental
    {
        return $this->rental;
    }

    public function setRental(?Rental $rental): static
    {
        $this->rental = $rental;

        return $this;
    }

    public function getPurchase(): ?Purchase
    {
        return $this->purchase;
    }

    public function setPurchase(?Purchase $purchase): static
    {
        $this->purchase = $purchase;

        return $this;
    }
}
