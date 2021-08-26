<?php

namespace App\Controller;

use App\Repository\HideoutsRepository;
use App\Repository\MissionsRepository;
use App\Repository\MissionTypeRepository;
use App\Repository\StatusRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MissionDetailController extends AbstractController
{
    /**
     * @Route("/missiondetails/{id}", name="mission_details")
     */
    public function index($id, MissionsRepository $missionsRepository,
                               StatusRepository $statusRepository,
                               MissionTypeRepository $missionTypeRepository,
                               HideoutsRepository $hideoutsRepository): Response
    {
        $mission = $missionsRepository->find($id);
        $status = $statusRepository->findAll();
        $missionType = $missionTypeRepository->findAll();
        $hideouts = $hideoutsRepository->findAll();

        return $this->render('mission_detail/index.html.twig', [
            'mission' => $mission,
            'status' => $status,
            'missionType' => $missionType,
            'hideouts' => $hideouts
        ]);
    }
}
