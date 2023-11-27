<?php

namespace App\Controller;

use App\Entity\Contact; 
use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ContactFormType; // Assurez-vous d'importer le bon type de formulaire
use App\Form\Annonce1Type; 
use App\Entity\Annonce; 
class HomeController extends AbstractController
{
    
  
    // #[Route('/home', name: 'app_home')]
    // public function index():Response{
    //     return $this->render('pages/index.html.twig');
    // }

    // public function Contact(Request $request)
    // {
    //     // Créez une instance de votre entité Contact
    //     $contact = new Contact();

    //     // Créez une instance de votre formulaire et associez-la à votre entité
    //     $form = $this->createForm(YourFormType::class, $contact);

    //     // Gérez la soumission du formulaire
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         // Le formulaire a été soumis et est valide, vous pouvez effectuer des actions ici
    //         // Par exemple, sauvegarder en base de données, envoyer un e-mail, etc.

    //         // Redirigez ou effectuez d'autres actions selon vos besoins
    //     }

    //     // Passez le formulaire à votre modèle Twig principal
    //     return $this->render('your_template.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }

    
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

 

    #[Route('/navbarProfile', name: 'navbarProfile')]
    
    public function navbarProfile(): Response
    {
        return $this->render('home/navbarProfile.html.twig');
    }


   
    #[Route('/sidebarleft', name: 'route_ sidebar_left')]
    
    public function sidebarleft(): Response
    {
        return $this->render('home/sidebar-left.html.twig');
    }


    #[Route('/sidebarright', name: 'route_sidebar_right')]
    
    public function sidebarright(): Response
    {
        return $this->render('home/sidebar-right.html.twig');
    }

    

    #[Route('/contenuprofile', name: 'contenuprofile')]
    
    public function contenuprofile(): Response
    {
        return $this->render('home/contenuprofile.html.twig');
    }
    #[Route('/signup', name: 'signup')]
    
    public function signup(): Response
    {
        return $this->render('home/signup.html.twig');
    }
    
    #[Route('/about', name: 'About')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }
    // #[Route('/ann', name: 'Abannout')]
    // public function ann( Request $request): Response
    // {
    //     $annonce = new Annonce();
    //     $form = $this->createForm(ContactFormType::class, $annonce);
    //     $form->handleRequest($request);
    //     $annonce=$form->getData(); 
    //     return $this->render('annonce/index.html.twig', [
    //         'annonces' => $annonce,
    //     ]);
    // }
}
