<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Voiture;
use App\Entity\Employer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');

        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ECFGarage');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Aller sur le site', 'fa fa-undo', routeName: 'app_home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Voiture', 'fa-solid fa-car', Voiture::class);
        yield MenuItem::linkToCrud('Commentaires', 'fa fa-comment', Comment::class);
        yield MenuItem::linkToCrud('Employer', 'fa fa-user', Employer::class);
    }
}
