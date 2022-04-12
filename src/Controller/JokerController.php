<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JokerController extends AbstractController
{
    #[Route('/joker', name: 'app_joker')]
    public function index(): Response
    {
        return $this->render('joker/joker.html.twig', [
            'controller_name' => 'JokerController',
        ]);
    }
}
