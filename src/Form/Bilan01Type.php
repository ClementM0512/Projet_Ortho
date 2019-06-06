<?php

namespace App\Form;

use App\Entity\Bilan01;
use App\Entity\DataODG;
use App\Entity\Parinaud;
use App\Entity\Rossano;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class Bilan01Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('corrections')
            ->add('allC', EntityType::class,[
                'class' => DataODG::class,
                'choice_label' => 'ODG'
            ])
            ->add('OG', EntityType::class,[
                'class' => DataODG::class,
                'choice_label' => 'ODG',
                'mapped' => false
            ])
            ->add('optotypes', ChoiceType::class, [
                'choices' => [
                    'Lettres' => 'Lettres',
                    'E' => 'E',
                    'Dessins' => 'Dessins', 
                ],
            ])
            ->add('echelle', ChoiceType::class, [
                'choices' => [
                    'Parinaud' => 'Parinaud',
                    'Rosano' => 'Rosano',
                ],
            ])
            ->add('affichages', ChoiceType::class, [
                'choices' => [
                    'Angulaire' => 'Angulaire',
                    'Linéaire' => 'Linéaire',
                ],
            ])
            ->add('distance', ChoiceType::class, [
                'choices' => [
                    '3m' => '3m',
                    '3.5m' => '3.5m',
                    '4m' => '4m',
                    '4.5m' => '4.5m',
                    '5m' => '5m',
                ],
            ])
            ->add('allVL', EntityType::class,[
                'class' => DataODG::class,
                'choice_label' => 'ODG'
            ])
            ->add('OGvl', EntityType::class,[
                'class' => DataODG::class,
                'choice_label' => 'ODG',
                'mapped' => false
            ])
            ->add('ODGvl', EntityType::class,[
                'class' => DataODG::class,
                'choice_label' => 'ODG',
                'mapped' => false
            ])
            ->add('allVP', EntityType::class,[
                'class' => Parinaud::class,
                'choice_label' => 'data'
            ])
            ->add('Rosano', EntityType::class,[
                'class' => Rossano::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('allPO')
            ->add('stereoscopique', ChoiceType::class,[
                'choices' => [

                ]
            ])
            ->add('couleurs')
            ->add('contrastes')
            ->add('accomodation')
            ->add('confrontation')
            ->add('fixation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bilan01::class,
        ]);
    }
}
