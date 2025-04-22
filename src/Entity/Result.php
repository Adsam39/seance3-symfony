<?php

namespace App\Entity;

use App\Repository\ResultRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultRepository::class)]
class Result
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Race::class)]
    private $race;

    #[ORM\ManyToOne(targetEntity: Driver::class)]
    private $driver;

    #[ORM\Column(type: 'integer')]
    private $position;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 1)]
    private $points;

    #[ORM\Column(type: 'boolean')]
    private $fastestLap;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getDriver(): ?Driver
    {
        return $this->driver;
    }

    public function setDriver(?Driver $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPoints(): ?string
    {
        return $this->points;
    }

    public function setPoints(string $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function isFastestLap(): ?bool
    {
        return $this->fastestLap;
    }

    public function setFastestLap(bool $fastestLap): self
    {
        $this->fastestLap = $fastestLap;

        return $this;
    }
}
