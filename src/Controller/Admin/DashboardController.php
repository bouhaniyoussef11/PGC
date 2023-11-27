<?php

namespace App\Controller\Admin;

use App\Controller\HomeController;
use App\Entity\Annonce;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem ;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudControlle;
use App\Entity\Club;
use App\Entity\User;
use App\Entity\Demande;
use App\Entity\Reservation;
class DashboardController extends AbstractDashboardController
{
    public function __construct(  private AdminUrlGenerator $adminUrlGenerator 
    )
{

}
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //  return parent::index();
        // return $this->render('admin/dashboard.html.twig');
      

         if ('ROLE_USR' === $this->getUser()->getRoles()) {
            return $this->redirectToRoute('app_home');
            }

            else{
                $url =$this->adminUrlGenerator  
                ->setController(ClubCrudController::class)
                ->generateUrl();
                return $this->redirect($url);
            }
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }
        // if ('youssef' === $this->getUser()->getUsername()) {
        //     return $this->render('admin/dashboard.html.twig');
        // }

       // return $this->render('admin/dashboard.html.twig');
    

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }
    #[Route('/admin/Home', name: 'adminHome')]
    public function dashboard(): Response
    {
        return $this->redirectToRoute('app_home'); // Change this to your custom route
    }
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dashboard Admin')
           // ->addMenuItem(MenuItem::linkToCrud('Users', 'fas fa-users', User::class))
            ->setFaviconPath('assets/images/im3.avif') ;
            // ->setAvatar('assets/images/im4.jpeg');
            // ->setFaviconPath(); 
           // ->setHeader('<h1>Custom Header</h1>');
            // ->setLogoPath('assets/images/votre_logo.png'); 
         }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', User::class);
        
        yield MenuItem::section('Club');
       // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::subMenu('ListeClubs', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Club', 'fa fa-plus',Club::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Club', 'fa fa-list',Club::class)
      
        ]);
        yield MenuItem::section('Reservation');
        yield MenuItem::subMenu('ListeReservation', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('Reserver', 'fa fa-plus',Reservation::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Reservations', 'fa fa-list',Reservation::class)
      
        ]);
        yield MenuItem::section('Membre');
        yield MenuItem::subMenu('ListeDesMembres', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('create Membre', 'fa fa-plus',User::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Membre', 'fa fa-list',User::class)
      
        ]);

        yield MenuItem::section('Annonce');
        yield MenuItem::subMenu('ListeAnnonce', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('create Annonce', 'fa fa-plus',Annonce::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Annonce', 'fa fa-list',Annonce::class)
      
        ]);
        
        yield MenuItem::section('Demande');
        yield MenuItem::subMenu('ListeDemandes', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('create Demande', 'fa fa-plus',Demande::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Demande', 'fa fa-list',Demande::class)
      
        ]);
      //  yield MenuItem::section('Home');
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
         // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
          
      
       
    }
}
