<?php

namespace App\Controller\Admin;

use App\Entity\Clubs;
use App\Entity\Races;
use App\Controller\Admin\RacesCrudController;
use App\Entity\CyclistsCategories;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        {
            $url = $this->adminUrlGenerator
                ->setController(RacesCrudController::class)
                ->generateUrl();
    
            return $this->redirect($url);
        }
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Easy Cyclisme');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Clubs','fas fa-users');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un club', 'fas fa-plus', Clubs::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des clubs', 'fas fa-eye', Clubs::class)
        ]);
        
        yield MenuItem::section('Compétitions','fas fa-flag-checkered');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer une course', 'fas fa-plus', Races::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des courses', 'fas fa-eye', Races::class)
        ]);

        yield MenuItem::section('Catégories','fas fa-biking');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer une catégories', 'fas fa-plus', CyclistsCategories::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des catégories', 'fas fa-eye', CyclistsCategories::class)
        ]);

        
    }
}
