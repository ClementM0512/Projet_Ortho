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
                'choice_label' => 'ODG',
                'mapped' => false
            ])
            ->add('OG', EntityType::class,[
                'class' => DataODG::class,
                'choice_label' => 'ODG',
                'mapped' => false
            ])
            ->add('optotypes', ChoiceType::class, [
                'choices' => [
                    ' ' => ' ',
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
                    ' ' => ' ',
                    'Angulaire' => 'Angulaire',
                    'Linéaire' => 'Linéaire',
                ],
            ])
            ->add('distance', ChoiceType::class, [
                'choices' => [
                    ' ' => ' ',
                    '3m' => '3m',
                    '3.5m' => '3.5m',
                    '4m' => '4m',
                    '4.5m' => '4.5m',
                    '5m' => '5m',
                ],
            ])
            ->add('allVL', EntityType::class,[
                'class' => DataODG::class,
                'choice_label' => 'ODG',
                'mapped' => false
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
            ->add('allVP', EntityType::class,[  //---Parinaud---//
                'class' => Parinaud::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('OGvpP', EntityType::class,[
                'class' => Parinaud::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('ODGvpP', EntityType::class,[   //---Parinaud---//
                'class' => Parinaud::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('Rosano', EntityType::class,[  //---Rosano---//
                'class' => Rossano::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('OGvpR', EntityType::class,[
                'class' => Rossano::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('ODGvpR', EntityType::class,[   //---Rosano---//
                'class' => Rossano::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('allPO')
            ->add('stereoscopique', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    'LANG I' => 'LANG I',
                    'LANG II' => 'LANG II',
                    'TNO' => 'TNO',
                ],
            ])
            ->add('stereo', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    '1200" chat, 600" étoile, 550" voiture' => '1200" chat, 600" étoile, 550" voiture',
                    '600" éléphant, 400" voiture, 200" lune' => '600" éléphant, 400" voiture, 200" lune',
                    '240", 120", 60", 30"' => '240", 120", 60", 30"',
                ],
                'mapped' => false
            ])
            ->add('couleurs', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    'BabyDalton' => 'BabyDalton',
                    'Ishihara' => 'Ishihara',
                ],
            ])
            ->add('couleurs2', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    'Normale' => 'Normale',
                    'Anormale' => 'Anormale',
                ],
                'mapped' => false
            ])
            ->add('contrastes', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    '100%' => '100%',
                    '75%' => '75%',
                    '50%' => '50%',
                    '25%' => '25%',
                    '10%' => '10%',
                    '8%' => '8%',
                    '6%' => '6%',
                    '5%' => '5%',
                    '4%' => '4%',
                    '2%' => '2%',
                ],
            ])
            ->add('SERRET', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    'Normale' => 'Normale',
                    'Anormale' => 'Anormale',
                ],
                'mapped' => false
            ])
            ->add('accomodation', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    'Elevé (supérieur à 5)' => 'Elevé (supérieur à 5)',
                    'Normal (3 à 5)' => 'Normal (3 à 5)',
                    'Bas (inferieur à 3)' => 'Bas (inferieur à 3)',
                ],
            ])
            ->add('confrontation', ChoiceType::class, [
                'choices' => [
                    ' ' => ' ',
                    'Semble normal' => 'Semble normal',
                    'Déficit CV droit' => 'Déficit CV droit',
                    'Déficit CV gauche' => 'Déficit CV gauche', 
                ],
            ])
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
