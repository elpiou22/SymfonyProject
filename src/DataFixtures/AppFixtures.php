<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager){

        $admin = new User();
        $admin->setFirstname('admin');
        $admin->setSurname('admin');
        $admin->setEmail('admin@admin.admin');
        $admin->setBirthdate(new \DateTime('1990-01-01'));
        $admin->setProfilePicture('uploads/profile_pictures/admin.png');


        $hashedPasswordAdmin = $this->passwordHasher->hashPassword(
            $admin,
            'admin'
        );
        $admin->setPassword($hashedPasswordAdmin);
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);


        $user = new User();
        $user->setFirstname('Bhartes');
        $user->setSurname('Kylian');
        $user->setEmail('k.bhartes@orange.fr');
        $user->setBirthdate(new \DateTime('2015-01-01'));
        $user->setProfilePicture('uploads/profile_pictures/kylian.png');

        $hashedPasswordUser = $this->passwordHasher->hashPassword(
            $user,
            'fortnite'
        );
        $user->setPassword($hashedPasswordUser);
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);


        $movie = new Movie();
        $movie->setTitle('Inception');
        $movie->setReleaseDate(new \DateTime('2010-07-16'));
        $movie->setSynopsis('Dom Cobb est un voleur, un spécialiste du vol d\'informations secrètes en pénétrant dans les rêves des cibles. Lorsqu\'il est proposé de réaliser un "Inception", l\'inverse d\'un vol, Cobb se voit offrir la chance de retrouver sa vie normale.');
        $movie->setDirector('Christopher Nolan');
        $movie->setAgeRequirement('13');
        $movie->setCoverImage('uploads/covers/inception.png');
        $movie->setMovieFile('uploads/movies/inception.mp4');
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseDate(new \DateTime('2008-07-18'));
        $movie->setSynopsis('Batman, avec l\'aide du procureur Harvey Dent et du commissaire Gordon, tente de déjouer les plans du Joker, un criminel anarchiste qui veut semer le chaos à Gotham City.');
        $movie->setDirector('Christopher Nolan');
        $movie->setAgeRequirement('12');
        $movie->setCoverImage('uploads/covers/the_dark_knight.png');
        $movie->setMovieFile('uploads/movies/the_dark_knight.mp4');
        $manager->persist($movie);


        $movie = new Movie();
        $movie->setTitle('The Matrix');
        $movie->setReleaseDate(new \DateTime('1999-03-31'));
        $movie->setSynopsis('Un hacker nommé Neo découvre que la réalité qu\'il connaît n\'est qu\'une simulation informatique créée par des machines pour contrôler l\'humanité. Il rejoint une rébellion pour combattre les machines.');
        $movie->setDirector('The Wachowskis');
        $movie->setAgeRequirement('16');
        $movie->setCoverImage('uploads/covers/the_matrix.png');
        $movie->setMovieFile('uploads/movies/the_matrix.mp4');
        $manager->persist($movie);


        $movie = new Movie();
        $movie->setTitle('The Lion King');
        $movie->setReleaseDate(new \DateTime('1994-06-15'));
        $movie->setSynopsis('Simba, un jeune lion, doit prendre son destin en main après la mort de son père Mufasa. Avec l\'aide de ses amis, il affronte son oncle Scar pour reprendre sa place légitime comme roi de la Terre des Lions.');
        $movie->setDirector('Roger Allers, Rob Minkoff');
        $movie->setAgeRequirement('6');
        $movie->setCoverImage('uploads/covers/the_lion_king.png');
        $movie->setMovieFile('uploads/movies/the_lion_king.mp4');
        $manager->persist($movie);










        $manager->flush();
    }
}
