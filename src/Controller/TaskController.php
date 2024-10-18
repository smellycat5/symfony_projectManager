<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route(path:'/tasks', name:'tasks')]
    public function index(): Response
    {
        $items = ['Item 1', 'Item 2', 'Item 3'];

        return $this->render('tasks/index.html.twig', [
            'items' => $items,
        ]);
    }
}
