<?php


namespace App\Controller;

use App\Form\MovieType;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;


use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movie;
use App\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class HomeController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $default_image = "images/default.webp";

        $movies = $entityManager->getRepository(Movie::class)->findAll();



        return $this->render('home.html.twig', [
            "image_path" => $default_image,
            'movies' => $movies
        ]);
    }

    #[Route('/signin', name: 'app_signin')]
    public function signin(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Hachage du mot de passe
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            );
            $user->setPassword($hashedPassword);

            // Sauvegarde de l'utilisateur
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirection ou connexion automatique après l'inscription
            return $this->redirectToRoute('home');
        }

        return $this->render('security/login.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/register', name: 'app_register', methods: ['POST'])]
    public function register(): Response
    {
        return $this->redirectToRoute('home');
    }


    #[Route('/create', name: 'app_create')]
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

    #[Route('/movies/{id}', 'app_movie_read')]
    public function read(
        Movie $movie,
        EntityManagerInterface $entityManager,
        int $id
    ): Response
    {
        $movie = $entityManager->getRepository(Movie::class)->find($id);

        return $this->render('Movie/watch.html.twig', [
            'movie' => $movie
        ]);

    }

    #[Route('/profile', name: 'app_profile')]
    #[IsGranted("IS_AUTHENTICATED_FULLY")]
    public function profile(): Response
    {

        $user = $this->getUser();

         if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        return $this->render('security/account.html.twig', [
            'user' => $user,
        ]);
    }



}