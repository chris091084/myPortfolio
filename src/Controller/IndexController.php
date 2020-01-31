<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ProjectRepository;
use http\Env\Request;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProjectRepository $project, \Symfony\Component\HttpFoundation\Request $request, MailerInterface $mailer)
    {
        $form= $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from('christian.coley@hotmail.fr')
                ->to('sylvainchristian@gmail.com')
                ->subject('Une nouvelle série vient d\'être publiée !')
                ->html('hello');

            $mailer->send($email);
            return $this->redirectToRoute('index');
        }
        return $this->render('index/index.html.twig', [
            'project' => $project->findAll(),
            'form'=> $form->createView()
        ]);
    }

    /**
     * @Route("/", name="base")
     */
    public function footNav(ProjectRepository $project)
    {



        return $this->render('base.html.twig', [
            'project' => $project->findAll(),
        ]);
    }


}
