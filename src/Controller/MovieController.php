<?php

namespace App\Controller;

use App\Entity\PasswordResetRequest;
use App\Form\MovieType;
use App\Form\RegistrationFormType;
use App\Form\ResetPasswordFormType;
use App\Form\ResetPasswordRequestFormType;
use App\Repository\PasswordResetRequestRepository;
use App\Repository\UserRepository;
use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;


use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movie;
use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;



class MovieController extends AbstractController
{




    #[Route('/create', name: 'movie_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($movie);
            $entityManager->flush();

            return $this->redirectToRoute('home'); // Redirection vers une page de succès
        }

        return $this->render('Movie/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/movies/update/{id}', name: 'movie_update')]
    public function edit(Request $request, Movie $movie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Le film a été modifié avec succès.');

            return $this->redirectToRoute('home');
        }

        return $this->render('Movie/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/movies/watch/{id}', 'movie_read')]
    public function read(
        Movie $movie,

        EntityManagerInterface $entityManager,
        int $id
    ): Response
    {
        $user = $this->getUser();
        $movie = $entityManager->getRepository(Movie::class)->find($id);

        $is_user_too_young = false;

        $birthdate = Carbon::parse($user->getBirthdate());
        $releaseDate = Carbon::parse($movie->getReleaseDate());
        $daysDifference = $birthdate->diffInDays($releaseDate);
        $ageRequirement = $movie->getAgeRequirement();
        if ($daysDifference < $ageRequirement * 365) {
            $is_user_too_young = true;
        }

        return $this->render('Movie/watch.html.twig', [
            'movie' => $movie,
            'is_user_too_young' => $is_user_too_young,
        ]);

    }











}