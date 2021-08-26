<?php

namespace App\Controller;

use App\Entity\Missions;
use App\Repository\MissionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    /**
     * @Route("/", name="home")
     */
    public function index(MissionsRepository $missionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $missions = $missionsRepository->findAll();

        $missionsPagination = $paginator->paginate(
            $missions, // on passe les données
            $request->query->getInt('page', 1), // numéro de la page en cours avec par défaut la page 1
            6 // nombre d'éléments par page ici 10 students
        );


        return $this->render('home/index.html.twig', [
            'missions' => $missionsPagination,
        ]);
    }

    /**
     * @Route("/search", name="mission_search")
     */
    public function search(MissionsRepository $missionsRepository, Request $request)
    {
        $term = $request->query->get('q');
        $missions = $missionsRepository->searchByTerm($term);

        return $this->render('missionsSearch.html.twig', [
            'missions' => $missions,
            'term' => $term
        ]);
    }

    //TODO : Sur une mission, la ou les cibles ne peuvent pas avoir la même nationalité que le ou les agents.
    //TODO ● Sur une mission, les contacts sont obligatoirement de la nationalité du pays de la mission.
    //TODO ● Sur une mission, la planque est obligatoirement dans le même pays que la mission.
    //TODO ● Sur une mission, il faut assigner au moins 1 agent disposant de la spécialité requise

    //TODO : Ajouter un système de filtres et de tri sur toutes les listes du site
    //TODO ● Utiliser l'AJAX pour envoyer et récupérer des données vers votre backend de façon asynchrone, sans avoir à recharger la page

}
