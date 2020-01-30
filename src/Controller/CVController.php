<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;
use App\Repository\FormationRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    /**
     * @Route("/cv", name="CV")
     */
    public function index(ProjectRepository $project, FormationRepository $formation, ExperienceRepository $experience)
    {
        return $this->render('cv/index.html.twig', [
            'project' => $project->findAll(),
            'formation'=> $formation->findAll(),
            'experience'=>$experience->findAll()
        ]);
    }
}
