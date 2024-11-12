<?php
namespace App\Service;

use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserNamer implements NamerInterface
{

    public function name($object, PropertyMapping $mapping): string
    {

        $email = $object->getEmail();



        $safeTitle = preg_replace('/[^a-zA-Z0-9-_]/', '_', $email);



        $file = $mapping->getFile($object);
        $extension = $file->guessExtension();


        return $safeTitle . '.' . $extension;
    }

}