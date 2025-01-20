<?php

// src/Controller/Admin/GestionFilmsController.php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminGestionFilmsController extends AbstractController{
    #[Route('/admin/gestion/films', name: 'app_admin_gestion_films')]
    public function index(): Response
    {
        return $this->render('admin/gestion_films/index.html.twig', [
            'controller_name' => 'Admin/GestionFilmsController',
        ]);
    }
}
