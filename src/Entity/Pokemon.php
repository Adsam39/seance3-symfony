<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private int $numeroPokedex;

    #[ORM\Column(type: 'string', length: 100)]
    private string $nom;

    #[ORM\ManyToOne(targetEntity: TypePokemon::class)]
    #[ORM\JoinColumn(nullable: false)]
    private TypePokemon $type1;

    #[ORM\ManyToOne(targetEntity: TypePokemon::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?TypePokemon $type2 = null;

    #[ORM\Column(type: 'integer')]
    private int $pv;

    #[ORM\Column(type: 'integer')]
    private int $attaque;

    #[ORM\Column(type: 'integer')]
    private int $defense;

    #[ORM\Column(type: 'integer')]
    private int $vitesse;

    #[ORM\ManyToOne(targetEntity: Talent::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Talent $talent = null;

    #[ORM\Column(type: 'integer')]
    private int $generation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroPokedex(): int
    {
        return $this->numeroPokedex;
    }

    public function setNumeroPokedex(int $numeroPokedex): self
    {
        $this->numeroPokedex = $numeroPokedex;

        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType1(): TypePokemon
    {
        return $this->type1;
    }

    public function setType1(TypePokemon $type1): self
    {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2(): ?TypePokemon
    {
        return $this->type2;
    }

    public function setType2(?TypePokemon $type2): self
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getPv(): int
    {
        return $this->pv;
    }

    public function setPv(int $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    public function getAttaque(): int
    {
        return $this->attaque;
    }

    public function setAttaque(int $attaque): self
    {
        $this->attaque = $attaque;

        return $this;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getVitesse(): int
    {
        return $this->vitesse;
    }

    public function setVitesse(int $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getTalent(): ?Talent
    {
        return $this->talent;
    }

    public function setTalent(?Talent $talent): self
    {
        $this->talent = $talent;

        return $this;
    }

    public function getGeneration(): int
    {
        return $this->generation;
    }

    public function setGeneration(int $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }
}
