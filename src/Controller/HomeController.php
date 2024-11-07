<?php


namespace App\Controller;

use App\Form\MovieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movie;



class HomeController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $default_image = "images/default.webp";

        $movies = $entityManager->getRepository(Movie::class)->findAll();



        return $this->render('base.html.twig', [
            "image_path" => $default_image,
            'movies' => $movies
        ]);
    }




    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        // Si l'utilisateur est déjà connecté, redirige vers la page d'accueil
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }


        return $this->render('login.html.twig', [

        ]);
    }

    #[Route('/register', name: 'app_register', methods: ['POST'])]
    public function register(): Response
    {
        return $this->redirectToRoute('app_home');
    }


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

        return $this->render('create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('movies/update/{id}', 'app_movie_update')]
    public function update(
        Movie $movie,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $form = $this->createForm(MovieType::class, $movie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($movie);
            $entityManager->flush();

            return $this->redirectToRoute('home'); // Redirection vers une page de succès
        }

        return $this->render('update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/watch', 'app_movie_read')]
    public function read(
        EntityManagerInterface $entityManager
    ): Response
    {
        $movies = $entityManager->getRepository(Movie::class)->findAll();

        return $this->render('test.html.twig', [
            'movies' => $movies
        ]);

    }

    #[Route('/movies', name: 'movies_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        // Récupérer tous les films de la base de données
        $movies = $entityManager->getRepository(Movie::class)->findAll();

        // Rendu de la vue avec les films
        return $this->render('movies/movies.html.twig', [
            'movies' => $movies,
        ]);
    }

}