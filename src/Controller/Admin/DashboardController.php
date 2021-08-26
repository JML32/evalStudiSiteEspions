<?php

namespace App\Controller\Admin;

use App\Entity\Agents;
use App\Entity\Contacts;
use App\Entity\Hideouts;
use App\Entity\HideoutsType;
use App\Entity\Missions;
use App\Entity\MissionType;
use App\Entity\Specialities;
use App\Entity\Status;
use App\Entity\Targets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(MissionsCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SpiesAgency');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Agents', 'fas fa-list', Agents::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-list', Contacts::class);
        yield MenuItem::linkToCrud('Planques', 'fas fa-list', Hideouts::class);
        yield MenuItem::linkToCrud('types de planques', 'fas fa-list', HideoutsType::class);
        yield MenuItem::linkToCrud('Missions', 'fas fa-list', Missions::class);
        yield MenuItem::linkToCrud('Types de missions', 'fas fa-list', MissionType::class);
        yield MenuItem::linkToCrud('Specialités', 'fas fa-list', Specialities::class);
        yield MenuItem::linkToCrud('Statuts', 'fas fa-list', Status::class);
        yield MenuItem::linkToCrud('Cibles', 'fas fa-list', Targets::class);
        yield MenuItem::linktoRoute('Accueil', 'fas fa-home', 'home');
    }
}
