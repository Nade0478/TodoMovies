<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Series;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('autor')
            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'name',
            ])
            ->add('summarize')
            ->add('nbrepisodes')
            ->add('nbrseasons')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
        ]);
    }
}
