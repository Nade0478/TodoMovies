<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminGestionContactController extends AbstractController{
    #[Route('/admin/gestion/contact', name: 'app_admin_gestion_contact')]
    public function index(): Response
    {
        return $this->render('admin/gestion_contact/index.html.twig', [
            'controller_name' => 'Admin/GestionContactController',
        ]);
    }
}
