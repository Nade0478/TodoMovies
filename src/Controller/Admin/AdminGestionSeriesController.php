<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminGestionSeriesController extends AbstractController{
    #[Route('/admin/gestion/series', name: 'app_admin_gestion_series')]
    public function index(): Response
    {
        return $this->render('admin/gestion_séries/index.html.twig', [
            'controller_name' => 'Admin/GestionSériesController',
        ]);
    }
}
