<?php
namespace App\Service;

use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MovieTitleNamer implements NamerInterface
{
    public function name($object, PropertyMapping $mapping): string
    {

        $title = $object->getTitle();


        $safeTitle = preg_replace('/[^a-zA-Z0-9-_]/', '_', $title);


        /** @var UploadedFile $file */
        $file = $mapping->getFile($object);
        $extension = $file->guessExtension();


        return $safeTitle . '.' . $extension;
    }
}