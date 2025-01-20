<?php

namespace App\Controller;

use App\Entity\Films;
use App\Form\FilmsType;
use App\Repository\FilmsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface; 
use Symfony\Component\Form\Extension\Core\Type\FileType; 
use Symfony\Component\Validator\Constraints\File; 

#[Route('/films')]
final class FilmsController extends AbstractController
{
    #[Route(name: 'app_films_index', methods: ['GET'])]
    public function index(FilmsRepository $filmsRepository): Response
    {
        return $this->render('films/index.html.twig', [
            'films' => $filmsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_films_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface 
    $slugger): Response
    {
        $film = new Films();
        $form = $this->createForm(FilmsType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($film);
            $entityManager->flush();
            $imageFile = $form->get('image')->getData(); 
            if ($imageFile) { 
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL 
                $safeFilename = $slugger->slug($originalFilename); 
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension(); 
                $imageFile->move( 
                    $this->getParameter('images_directory'), 
                    $newFilename
                );
                $films->setImage($newFilename); 

            } 
            $entityManager->persist($film); 
            $entityManager->flush(); 

            return $this->redirectToRoute('app_films_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('films/new.html.twig', [
            'film' => $film,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_films_show', methods: ['GET'])]
    public function show(Films $film): Response
    {
        return $this->render('films/show.html.twig', [
            'film' => $film,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_films_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Films $film, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FilmsType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_films_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('films/edit.html.twig', [
            'film' => $film,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_films_delete', methods: ['POST'])]
    public function delete(Request $request, Films $film, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$film->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($film);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_films_index', [], Response::HTTP_SEE_OTHER);
    }
}
