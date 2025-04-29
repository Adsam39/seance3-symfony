<?php

namespace App\Controller;

use App\Entity\Driver;
use App\Entity\Race;
use App\Entity\Team;
use App\Repository\DriverRepository;
use App\Repository\RaceRepository;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FormulaOneController extends AbstractController
{
    #[Route('/formula-one', name: 'app_formula_one')]
    public function index(RaceRepository $raceRepository, DriverRepository $driverRepository, TeamRepository $teamRepository): Response
    {
        $races = $raceRepository->findAll();
        $drivers = $driverRepository->findAll();
        $teams = $teamRepository->findAll();


        return $this->render('formula_one/index.html.twig', [
            'races' => $races,
            'drivers' => $drivers,
            'teams' => $teams,
        ]);
    }

    #[Route('formula-one/race/{id}', name: 'race_show')]
    public function showRace(Race $race): Response
    {
        return $this->render('formula_one/race.html.twig', [
            'race' => $race,
        ]);
    }

    #[Route('formula-one/driver/{id}', name: 'driver_show')]
    public function showDriver(Driver $driver): Response
    {
        return $this->render('formula_one/driver.html.twig', [
            'driver' => $driver,
        ]);
    }

    #[Route('formula-one/team/{id}', name: 'team_show')]
    public function showTeam(Team $team): Response
    {
        return $this->render('formula_one/team.html.twig', [
            'team' => $team,
        ]);
    }
}
