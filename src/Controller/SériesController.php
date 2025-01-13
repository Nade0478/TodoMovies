<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SériesController extends AbstractController
{
    #[Route('/s/ries', name: 'app_s_ries')]
    public function index(): Response
    {
        return $this->render('séries/index.html.twig', [
            'controller_name' => 'SériesController',
        ]);
    }
}
