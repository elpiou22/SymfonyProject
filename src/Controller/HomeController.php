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


    #[Route('/to_watch_later_check', name: 'app_to_watch_later_check')]
    public function sessionCheck(): JsonResponse
    {
        $user = $this->getUser();

        $user.setTowatchlater()


        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return new JsonResponse(['status' => 'session_expired'], 401);
        }
        return new JsonResponse(['status' => 'session_active']);
    }





}