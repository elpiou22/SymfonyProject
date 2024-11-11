<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;



class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('releaseDate', null, [
                'widget' => 'single_text'
            ])
            ->add('synopsis')
            ->add('director')
            ->add('ageRequirement')
            ->add('coverImageFile', FileType::class, [
                'label' => 'Image de couverture',
                'required' => false,
            ])
            ->add('movieFileFile', FileType::class, [
                'label' => 'Fichier vidéo',
                'required' => false,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
