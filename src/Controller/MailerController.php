<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailerController extends AbstractController
{
    // #[Route('/mailer', name: 'app_mailer')]
    // public function index(MailerInterface $mailer): Response
    // {
    //     $email = (new Email())
    //         ->from('user.carryall@gmail.com')
    //         ->to('user.carryall@gmail.com')
    //         ->subject('Test objet email')
    //         ->text('Text contenu email');

    //     $mailer->send($email);
    // }
}
