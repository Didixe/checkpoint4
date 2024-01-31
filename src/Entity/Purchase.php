<?php

namespace App\Entity;

use App\Repository\PurchaseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PurchaseRepository::class)]
class Purchase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Delivery_date = null;

    #[ORM\ManyToOne(inversedBy: 'purchases')]
    #[ORM\JoinColumn(nullable: false)]
    private ?client $client = null;

    #[ORM\OneToMany(mappedBy: 'purchase', targetEntity: Instrument::class)]
    private Collection $Instrument;

    public function __construct()
    {
        $this->Instrument = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->Delivery_date;
    }

    public function setDeliveryDate(?\DateTimeInterface $Delivery_date): static
    {
        $this->Delivery_date = $Delivery_date;

        return $this;
    }

    public function getClient(): ?client
    {
        return $this->client;
    }

    public function setClient(?client $client): static
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
            $instrument->setPurchase($this);
        }

        return $this;
    }

    public function removeInstrument(Instrument $instrument): static
    {
        if ($this->Instrument->removeElement($instrument)) {
            // set the owning side to null (unless already changed)
            if ($instrument->getPurchase() === $this) {
                $instrument->setPurchase(null);
            }
        }

        return $this;
    }
}
