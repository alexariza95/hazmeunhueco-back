<?php

namespace App\Form;

use App\Entity\Journey;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JourneyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('arrivezone')
            ->add('departurezone')
            ->add('plusSpaces')
            ->add('bigSpaces')
            ->add('mediumSpaces')
            ->add('smallSpaces')
            ->add('miniSpaces')
            ->add('departureTime')
            ->add('arriveTime')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Journey::class,
        ]);
    }
}
