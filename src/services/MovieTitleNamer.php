<?php
namespace App\Service;

use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MovieTitleNamer implements NamerInterface
{
    public function name($object, PropertyMapping $mapping): string
    {
        // Récupère le titre du film (assurez-vous que la propriété existe dans l'entité Movie)
        $title = $object->getTitle();

        // Assurez-vous que le titre est en format compatible avec les noms de fichiers
        $safeTitle = preg_replace('/[^a-zA-Z0-9-_]/', '_', $title);

        // Récupère l'extension du fichier uploadé
        /** @var UploadedFile $file */
        $file = $mapping->getFile($object);
        $extension = $file->guessExtension();

        // Renvoie le nom complet avec l'extension
        return $safeTitle . '.' . $extension;
    }
}