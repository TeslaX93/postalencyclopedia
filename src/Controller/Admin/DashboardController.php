<?php

namespace App\Controller\Admin;

use App\Entity\Provider;
use App\Entity\Province;
use App\Entity\Territory;
use App\Entity\Address;
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
            ->setTitle('PostalEncyclopedia');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Terytorium', 'fas fa-list', Territory::class);
        yield MenuItem::linkToCrud('Operator', 'fas fa-list', Provider::class);
        yield MenuItem::linkToCrud('Adresy', 'fas fa-list', Address::class);
    }
}
