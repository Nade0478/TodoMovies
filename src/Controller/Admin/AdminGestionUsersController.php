<?php

// src/Controller/Admin/GestionUsersController.php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminGestionUsersController extends AbstractController{
    #[Route('/admin/gestion/users', name: 'app_admin_gestion_users')]
    public function index(): Response
    {
        return $this->render('admin/gestion_users/index.html.twig', [
            'controller_name' => 'Admin/GestionUsersController',
        ]);
    }
}
