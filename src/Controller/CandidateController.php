<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidateController extends AbstractController
{
    #[Route('/candidate', name: 'app_candidate_profil')]
    public function profil(): Response
    {
        return $this->render('candidate/index.html.twig', [
            'controller_name' => 'CandidateController',
        ]);
    }
}
