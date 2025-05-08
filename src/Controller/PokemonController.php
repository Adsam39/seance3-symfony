<?php

namespace App\Controller;

use App\Repository\EvolutionRepository;
use App\Repository\PokemonRepository;
use App\Repository\TalentRepository;
use App\Repository\TypePokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PokemonController extends AbstractController
{
    #[Route('/pokemon', name: 'app_pokemon')]
    public function index(PokemonRepository $pokemonRepository, TypePokemonRepository $typePokemonRepository, TalentRepository $talentRepository, EvolutionRepository $evolutionRepository): Response
    {
        $pokemons = $pokemonRepository->findAll();
        $typesList = $typePokemonRepository->findAll();
        $talentsList = $talentRepository->findAll();
        $evolutionsList = $evolutionRepository->findAll();

        // Construction des tableaux associatifs
        $types = [];
        foreach ($typesList as $type) {
            $types[$type->getId()] = $type->getNom();
        }

        $talents = [];
        foreach ($talentsList as $talent) {
            $talents[$talent->getId()] = [
                'nom' => $talent->getNom(),
                'description' => $talent->getDescription(),
            ];
        }

        $evolutions = [];
        foreach ($evolutionsList as $evo) {
            $evolutions[$evo->getPokemonBase()->getId()] = [
                'pokemon_evolue_id' => $evo->getPokemonEvolue()->getId(),
                'condition' => $evo->getCondition(),
            ];
        }

        $pokemonsById = [];
        foreach ($pokemons as $pokemon) {
            $pokemonsById[$pokemon->getId()] = $pokemon;
        }
        
        return $this->render('pokemon/index.html.twig', [
            'pokemons' => $pokemons,
            'types' => $types,
            'talents' => $talents,
            'evolutions' => $evolutions,
            'pokemons_by_id' => $pokemonsById,
        ]);
    }

    // Page de détails pour un Pokémon spécifique
    #[Route('/pokemon/{id}', name: 'pokemon_show')]
    public function show(int $id, PokemonRepository $pokemonRepository): Response
    {
        // Récupérer le Pokémon par son ID
        $pokemon = $pokemonRepository->find($id);
        
        if (!$pokemon) {
            throw $this->createNotFoundException('Pokémon non trouvé');
        }

        return $this->render('pokemon/pokemon.html.twig', [
            'pokemon' => $pokemon,
        ]);
    }
}
