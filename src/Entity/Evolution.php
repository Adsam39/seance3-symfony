<?php

namespace App\Entity;

use App\Repository\EvolutionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvolutionRepository::class)]
class Evolution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Pokemon::class)]
    private Pokemon $pokemonBase;

    #[ORM\ManyToOne(targetEntity: Pokemon::class)]
    private Pokemon $pokemonEvolue;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $condition = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokemonBase(): Pokemon
    {
        return $this->pokemonBase;
    }

    public function setPokemonBase(Pokemon $pokemonBase): self
    {
        $this->pokemonBase = $pokemonBase;

        return $this;
    }

    public function getPokemonEvolue(): Pokemon
    {
        return $this->pokemonEvolue;
    }

    public function setPokemonEvolue(Pokemon $pokemonEvolue): self
    {
        $this->pokemonEvolue = $pokemonEvolue;

        return $this;
    }

    public function getCondition(): ?string
    {
        return $this->condition;
    }

    public function setCondition(?string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function __toString(): string
    {
        return $this->pokemonBase->getNom() . ' -> ' . $this->pokemonEvolue->getNom() . ($this->condition ? ' (' . $this->condition . ')' : '');
    }
}
