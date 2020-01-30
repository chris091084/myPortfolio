<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(ProjectRepository $project)
    {



        return $this->render('index/index.html.twig', [
            'project' => $project->findAll(),
        ]);
    }
}
