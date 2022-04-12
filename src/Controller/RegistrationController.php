<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Candidate;
use App\Security\CompanyAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\CompanyRegistrationFormType;
use App\Form\CandidateRegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;


class RegistrationController extends AbstractController
{
    //  ENREGISTREMENT NOUVELLE ENTREPRISE
    #[Route('/register_company', name: 'app_registration_companyRegister')]
    public function companyRegister(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, CompanyAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Company();
        $form = $this->createForm(CompanyRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

            return $this->render('registration/companyRegister.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


    // // ENREGISTREMENT NOUVEAU CANDIDAT
    #[Route('/register_candidate', name: 'app_registration_candidateRegister')]
    public function candidateRegister(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, CompanyAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Candidate();
        $form = $this->createForm(CandidateRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/candidateRegister.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
