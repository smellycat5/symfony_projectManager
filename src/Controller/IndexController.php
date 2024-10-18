<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route(path:'/', name:'landing')]
    public function index(): Response
    {
        return $this->render('landing.html.twig');
    }
}
