<?php

namespace App\Entity;

use App\Repository\CircuitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CircuitRepository::class)]
class Circuit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private $name;

    #[ORM\Column(length: 100, nullable: true)]
    private $location;

    #[ORM\Column(length: 100, nullable: true)]
    private $country;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $lengthKm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLengthKm(): ?string
    {
        return $this->lengthKm;
    }

    public function setLengthKm(?string $lengthKm): self
    {
        $this->lengthKm = $lengthKm;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
