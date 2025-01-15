<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/contact', name: 'contact')] 
    public function contact(): Response 
    { 
        return $this->render('main/contact.html.twig', [ 
            'contact_param' => 'Salut les amis!', 
        ]); 
    }
    #[Route('/app_films_index', name: 'films')] 
    public function films(): Response 
    { 
        return $this->render('main/films.html.twig', [ 
            'films_param' => 'Salut les amis!', 
        ]); 
    }
    #[Route('app_series_index', name: 'series')] 
    public function series(): Response 
    { 
        return $this->render('main/series.html.twig', [ 
            'series_param' => 'Salut les amis!', 
        ]); 
    }
    #[Route('/users', name: 'users')] 
    public function users(): Response 
    { 
        return $this->render('main/users.html.twig', [ 
            'users_param' => 'Salut les amis!', 
        ]); 
    }
}