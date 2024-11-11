<?php

// src/Repository/PasswordResetRequestRepository.php

namespace App\Repository;

use App\Entity\PasswordResetRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PasswordResetRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PasswordResetRequest::class);
    }

    // Ajoutez vos méthodes de requêtes personnalisées ici, si nécessaire.
}

