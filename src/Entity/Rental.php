<?php

namespace App\Entity;

use App\Repository\RentalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentalRepository::class)]
class Rental
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Duration = null;

    #[ORM\Column(length: 255)]
    private ?string $Price = null;

    #[ORM\ManyToOne(inversedBy: 'rentals')]
    private ?Client $client = null;

    #[ORM\OneToMany(mappedBy: 'rental', targetEntity: Instrument::class)]
    private Collection $Instrument;

    public function __construct()
    {
        $this->Instrument = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->Duration;
    }

    public function setDuration(\DateTimeInterface $Duration): static
    {
        $this->Duration = $Duration;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, Instrument>
     */
    public function getInstrument(): Collection
    {
        return $this->Instrument;
    }

    public function addInstrument(Instrument $instrument): static
    {
        if (!$this->Instrument->contains($instrument)) {
            $this->Instrument->add($instrument);
            $instrument->setRental($this);
        }

        return $this;
    }

    public function removeInstrument(Instrument $instrument): static
    {
        if ($this->Instrument->removeElement($instrument)) {
            // set the owning side to null (unless already changed)
            if ($instrument->getRental() === $this) {
                $instrument->setRental(null);
            }
        }

        return $this;
    }
}
