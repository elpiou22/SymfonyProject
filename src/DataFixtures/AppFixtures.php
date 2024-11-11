<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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

        $hashedPasswordAdmin = $this->passwordHasher->hashPassword(
            $user,
            'fortnite'
        );
        $user->setPassword($hashedPasswordAdmin);
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);


        $manager->flush();
    }
}
