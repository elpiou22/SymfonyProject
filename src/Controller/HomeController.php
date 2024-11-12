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



class HomeController extends AbstractController
{




    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();

        $default_image = "images/default.webp";

        $movies = $entityManager->getRepository(Movie::class)->findAll();

        return $this->render('home.html.twig', [
            "image_path" => $default_image,
            'movies' => $movies,
            'user' => $user
        ]);
    }


    #[Route('/to_watch_later_check', name: 'app_to_watch_later_check', methods: ['POST'])]
    public function sessionCheck(Request $request, EntityManagerInterface $entityManager): Response
    {

        $data = json_decode($request->getContent(), true);
        $movie_id = $data['movie_id'];
        $user_id = $data['user_id'];
        $status = $data['status'];

        $user = $entityManager->getRepository(User::class)->findOneBy(['id' => $user_id]);



        if ($status == 201) {
            $user->addTowatchlater($movie_id);
            $entityManager->flush();
            return new Response(
                json_encode(['message' => 'Film ajouté à la liste "à regarder plus tard".']),
                Response::HTTP_CREATED
            );
        } else if ($status == 205) {
            $user->removeTowatchlater($movie_id);
            $entityManager->flush();
            return new Response(
                json_encode(['message' => 'Film suprimé de la liste "à regarder plus tard".']),
                Response::HTTP_CREATED
            );
        } else {
            return new JsonResponse(['message' => 'Statut inconnu'], Response::HTTP_BAD_REQUEST);
        }



    }





}