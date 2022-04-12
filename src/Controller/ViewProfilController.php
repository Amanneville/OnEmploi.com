<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_view_profil')]
    public function profil(): Response
    {
        return $this->render('viewProfil/index.html.twig', [
            'controller_name' => 'ViewProfilController',
        ]);
    }
}
