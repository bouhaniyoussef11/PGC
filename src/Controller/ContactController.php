<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MailerInterface $mailer, Request $request, EntityManagerInterface $manager): Response
    {
        $contact = new Contact();

        // if ($this->getUser()) {
        //     $contact->setFullName($this->getUser()->getFullname())
        //             ->setEmail($this->getUser()->getEmail());        
        // }

 $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $contact=$form->getData();
            // Récupérez les données du formulaire
            $manager->persist($contact);
            $manager->flush();

            // Envoyez un e-mail
            $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('ferdawesbouhani6@gmail.com') // Remplacez par votre adresse e-mail
                ->subject($contact->getSubject())
                ->text($contact->getText())
                ->htmlTemplate('contact/index.html.twig', [
                    'contact' => $contact
                ])
                ->context(['contact' => $contact]);
                
            $mailer->send($email);
            $this->addFlash('success', 'Votre message a été envoyé !');
            
        }
      

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/mailer", name="mailer")
     */
    #[Route('/mailer', name: 'app_mailer')]
    public function mailer(): Response
    {
        //  $contact = new Contact();
        
        return $this->render('contact/index.html.twig');

    }
}
