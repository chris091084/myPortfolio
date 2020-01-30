<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProjectRepository $project)
    {



        return $this->render('index/index.html.twig', [
            'project' => $project->findAll(),
        ]);
    }


}
