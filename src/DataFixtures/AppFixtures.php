<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager){
        $filesystem = new Filesystem();
        $uploadsDirectory = 'public/uploads';

        $admin = new User();
        $admin->setFirstname('admin');
        $admin->setSurname('admin');
        $admin->setEmail('admin@admin.admin');
        $admin->setBirthdate(new \DateTime('1990-01-01'));
        $profilePicturePath = 'public/uploads/profile_pictures/admin.png';
        if (file_exists($profilePicturePath)) {
            $uploadedFile = new UploadedFile($profilePicturePath, 'admin-profile.jpg');
            $adminUser->setProfilePictureFile($uploadedFile);
        }

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

        $hashedPasswordUser = $this->passwordHasher->hashPassword(
            $user,
            'fortnite'
        );
        $user->setPassword($hashedPasswordUser);
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);


        $manager->flush();
    }
}
