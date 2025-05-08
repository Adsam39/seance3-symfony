<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use App\Repository\ArtistRepository;
use App\Repository\GenreRepository;
use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MusicController extends AbstractController
{
    #[Route('/music', name: 'app_music')]
    public function index(
        GenreRepository $genreRepository,
        AlbumRepository $albumRepository,
        ArtistRepository $artistRepository,
        SongRepository $songRepository
    ): Response {
        $genres = $genreRepository->findAll(); // Récupérer tous les genres
        $albums = $albumRepository->findAll(); // Récupérer tous les albums
        $artists = $artistRepository->findAll(); // Récupérer tous les artistes
        $songs = $songRepository->findAll(); // Récupérer toutes les chansons

        return $this->render('music/index.html.twig', [
            'genres' => $genres,
            'albums' => $albums,
            'artists' => $artists,
            'songs' => $songs,
        ]);
    }

    // Afficher les détails d'un artiste
    #[Route('/artist/{id}', name: 'app_artist_show')]
    public function showArtist(ArtistRepository $artistRepository, int $id): Response
    {
        $artist = $artistRepository->find($id); // Récupérer l'artiste par ID
        if (!$artist) {
            throw $this->createNotFoundException('Artiste non trouvé');
        }

        return $this->render('music/artist.html.twig', [
            'artist' => $artist,
        ]);
    }

    // Afficher les détails d'un album
    #[Route('/album/{id}', name: 'app_album_show')]
    public function showAlbum(AlbumRepository $albumRepository, int $id): Response
    {
        $album = $albumRepository->find($id); // Récupérer l'album par ID
        if (!$album) {
            throw $this->createNotFoundException('Album non trouvé');
        }

        return $this->render('music/album.html.twig', [
            'album' => $album,
        ]);
    }
}
