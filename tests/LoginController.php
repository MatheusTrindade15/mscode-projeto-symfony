<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route(path: '/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if (empty($_SESSION['_sf2_meta'])){
        //     return $this->redirectToRoute('app');
        // }
        
        // pega o erro de login se houver um
        $error = $authenticationUtils->getLastAuthenticationError();
        
        // último nome de usuário digitado pelo usuário
        $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render('login/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): Response
    {
        return $this->redirect('login');
    }
}
