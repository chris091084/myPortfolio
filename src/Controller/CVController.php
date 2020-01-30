<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    /**
     * @Route("/cv", name="CV")
     */
    public function index(ProjectRepository $project)
    {
        return $this->render('cv/index.html.twig', [
            'project' => $project->findAll(),
        ]);
    }
}
