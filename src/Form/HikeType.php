<?php

namespace App\Form;

use App\Entity\Hike;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          
            ->add('nameHike')
            ->add('descHike')
            ->add('cityHike')
            ->add('timeHike')
            ->add('distHike')
            ->add('heightHike')
            ->add('downHike')
            ->add('difficultyHike')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hike::class,
        ]);
    }
}
