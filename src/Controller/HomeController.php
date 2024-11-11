<?php


namespace App\Controller;

use App\Entity\PasswordResetRequest;
use App\Form\MovieType;
use App\Form\RegistrationFormType;
use App\Form\ResetPasswordFormType;
use App\Form\ResetPasswordRequestFormType;
use App\Repository\PasswordResetRequestRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;


use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movie;
use App\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;



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
    public function signin(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer


    ): Response
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

            do {
                $randomNumber = mt_rand(100000000000, 999999999999);
            } while ($entityManager->getRepository(Movie::class)->findOneBy(['token' => $randomNumber]) == $randomNumber);
            $user->setToken($randomNumber);


            $entityManager->persist($user);
            $entityManager->flush();

            $email = (new Email())
                ->from('donotreply@monflix.com')
                ->to($form->get('email')->getData())
                ->subject('Votre compte MonFlix est bien créé.')
                ->text('' -
                'Bonjour ' - $form->get('firstname')->getData() - ',\n' -
                'Merci pour votre inscription au site MonFlix.' -
                'Profitez bien de votre expérience chez nous.' -
                'Cordialement, ' -
                'L\'équipe MonFlix.'
                );

            $mailer->send($email);


            return $this->redirectToRoute('home');
        }

        return $this->render('security/login.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /*
    #[Route('/send_reset_email/', name: 'app_send_email_reset', methods: ['POST'])]
    public function reset_email(MailerInterface $mailer, String $email): Response
    {

        return new Response($email, Response::HTTP_OK);



        $email_to_send = (new Email())
            ->from('donotreply@monflix.com')
            ->to($email)
            ->subject('Réinitialisation du mot de passe')
            ->text('' -
                "Veuillez cliquer ici pour mettre à jour votre mot de passe:" -
                ''
            );

        $mailer->send($email_to_send);


        return $this->redirectToRoute('home');
    }
    */


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
                // Créer un token pour la réinitialisation du mot de passe
                $token = bin2hex(random_bytes(32));

                $resetRequest = new PasswordResetRequest();
                $resetRequest->setUser($user);
                $resetRequest->setToken($token);
                $resetRequest->setCreatedAt(new \DateTime());


                $entityManager->persist($resetRequest);
                $entityManager->flush();

                // Envoi de l'email avec le lien de réinitialisation
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