<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\User;
use App\Entity\Contract;
use App\Entity\Car;
use App\Entity\Categorie;
use App\Entity\Engine;
use App\Entity\Seat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Loca-Auto');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        //yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        yield MenuItem::section('User');
        yield MenuItem::linkToCrud('Liste', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', User::class)->setAction('new');
        yield MenuItem::section('Location');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Contract::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Contract::class)->setAction('new');
        yield MenuItem::section('Voitures');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Car::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Car::class)->setAction('new');
        yield MenuItem::section('Marques');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Brand::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Brand::class)->setAction('new');
        yield MenuItem::section('Motorisation');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Engine::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Engine::class)->setAction('new');
        yield MenuItem::section('Catégorie');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Categorie::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Categorie::class)->setAction('new');
        yield MenuItem::section('Nombre de siège');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Seat::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Seat::class)->setAction('new');
        // yield MenuItem::section('Image');
        // yield MenuItem::linkToCrud('Liste', 'fas fa-car', Car::class);
        // yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Car::class)->setAction('new');
        yield MenuItem::section();
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out-alt');

    }
}
