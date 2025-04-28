<?php

namespace App\Entity;

use App\Repository\SongRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SongRepository::class)]
class Song
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $title;

    #[ORM\Column(type: 'integer')]
    private int $duration; // en secondes

    #[ORM\ManyToOne(targetEntity: Album::class, inversedBy: 'songs')]
    #[ORM\JoinColumn(nullable: false)]
    private Album $album;

    #[ORM\ManyToOne(targetEntity: Genre::class, inversedBy: 'songs')]
    #[ORM\JoinColumn(nullable: false)]
    private Genre $genre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getAlbum(): Album
    {
        return $this->album;
    }

    public function setAlbum(Album $album): self
    {
        $this->album = $album;

        return $this;
    }

    public function getGenre(): Genre
    {
        return $this->genre;
    }

    public function setGenre(Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }
}
