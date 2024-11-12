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


/*
class HomeController extends AbstractController
{


    #[Route('/session-check', name: 'app_session_check')]
    public function sessionCheck(): JsonResponse
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            // return $this->redirectToRoute('home');
            return new JsonResponse(['status' => 'session_expired'], 401);
        }

        return new JsonResponse(['status' => 'session_active']);
    }





    #[Route('/login', name: 'app_login')]
    public function _(): Response{
        return $this->redirectToRoute('app_signin');
    }

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
    public function signin(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer,
    ): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            );
            $user->setPassword($hashedPassword);
            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            $entityManager->flush();

            $email = (new Email())
                ->from('donotreply@monflix.com')
                ->to($form->get('email')->getData())
                ->subject('Votre compte MonFlix est bien créé.')
                ->text('' .
                    'Bonjour ' . $form->get('firstname')->getData() . ',\n' .
                    'Merci pour votre inscription au site MonFlix.' .
                    'Profitez bien de votre expérience chez nous.' .
                    'Cordialement, ' .
                    'L\'équipe MonFlix.'
                );

            $mailer->send($email);


            return $this->redirectToRoute('home');
        }

        return $this->render('security/login.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }




    #[Route('/send_reset_email', name: 'app_send_email_reset')]
    public function request(
        Request $request,
        UserRepository $userRepository,
        MailerInterface $mailer,
        EntityManagerInterface $entityManager
    ): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $user = $userRepository->findOneBy(['email' => $email]);

            if ($user) {

                $token = bin2hex(random_bytes(32));

                $resetRequest = new PasswordResetRequest();
                $resetRequest->setUser($user);
                $resetRequest->setToken($token);
                $resetRequest->setCreatedAt(new \DateTime());


                $entityManager->persist($resetRequest);
                $entityManager->flush();


                $emailMessage = (new Email())
                    ->from('donotreply@monflix.com')
                    ->to($email)
                    ->subject('Réinitialisation de votre mot de passe')
                    ->html(
                        $this->renderView('security/mail_to_send_to_reset.html.twig', [
                            'token' => $token,
                            'user' => $user,
                        ])
                    );

                $mailer->send($emailMessage);
            }

            // MAUVAIS EMAIL, A FAIRE UNE PAGE OU UNE ERREUR
            return $this->redirectToRoute('home');
        }

        return $this->render('security/send_email.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/reset_password/{token}', name: 'app_reset_password')]
    public function resetPassword(
        Request $request,
        PasswordResetRequestRepository $resetRequestRepository,
        $token,
        EntityManagerInterface $entityManager
    ): Response
    {
        $resetRequest = $resetRequestRepository->findOneBy(['token' => $token]);

        if (!$resetRequest || $resetRequest->getCreatedAt() < new \DateTime('-1 hour')) {
            // Token expiré ou invalide
            return new Response("Token expiré");
        }

        // Créer un formulaire pour le mot de passe
        $form = $this->createForm(ResetPasswordFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Mettre à jour le mot de passe de l'utilisateur
            $user = $resetRequest->getUser();
            $password = $form->get('plainPassword')->getData();
            $user->setPassword(password_hash($password, PASSWORD_BCRYPT));  // Hachage du mot de passe


            $entityManager->flush();

            // Supprimer le token de réinitialisation après utilisation
            $entityManager->remove($resetRequest);
            $entityManager->flush();

            return $this->redirectToRoute('app_signin');
        }

        return $this->render('security/pwd_reset.html.twig', [
            'form' => $form->createView(),
        ]);
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

    #[Route('/movies/update/{id}', name: 'app_movie_update')]
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

    #[Route('/movies/watch/{id}', 'app_movie_read')]
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

    #[Route('/update_profile', name: 'app_update_profile')]
    #[IsGranted("IS_AUTHENTICATED_FULLY")]
    public function update_profile(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {

        $user = $this->getUser();

        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            );
            $user->setPassword($hashedPassword);


            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute('app_profile');
        }

        return $this->render('security/profile_update.html.twig', [
            'registrationForm' => $form->createView(),
        ]);

    }




}

*/