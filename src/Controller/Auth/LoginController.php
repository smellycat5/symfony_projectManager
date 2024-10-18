<?php

namespace App\Controller\Auth;

use App\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route(path:'/login', name:'login')]
    public function login(Request $request): Response
    {
        $form = $this->createForm(LoginFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Handle login logic here (authentication, etc.)
            // For example, you can get the data:
            $data = $form->getData();
            $username = $data['username'];
            $password = $data['password'];

            // TODO: Implement your authentication logic here

            // Redirect after successful login (example)
            return $this->redirectToRoute('home'); // Change 'home' to your desired route
        }

        return $this->render('auth/login.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
