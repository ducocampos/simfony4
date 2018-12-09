<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $util)
    {
        $error = $util->getLastAuthenticationError();
        $lastUserName = $util->getLastUsername();

        return $this->render("login/login.html.twig",
        [
            'error' => $error,
            'last_username' => $lastUserName
        ]);
    }

    
}
