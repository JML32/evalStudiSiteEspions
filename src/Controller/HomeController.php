<?php

namespace App\Controller;

use App\Entity\Missions;
use App\Repository\MissionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    /**
     * @Route("/", name="home")
     */
    public function index(MissionsRepository $missionsRepository): Response
    {
        $missions = $missionsRepository->findAll();
        //dd($missions);
        return $this->render('home/index.html.twig', [
            'missions' => $missions,
        ]);
    }
}
