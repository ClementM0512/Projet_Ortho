<?php

namespace App\Form;

use App\Entity\Bilan01;
use App\Entity\DataODG;
use App\Entity\Parinaud;
use App\Entity\Rossano;
use App\Entity\Stereoscopique;
use App\Entity\Optotypes;
use App\Entity\Echelle;
use App\Entity\Affichages;
use App\Entity\Distance;
use App\Entity\Stereo;
use App\Entity\Couleurs;
use App\Entity\Couleurs2;
use App\Entity\Contrastes;
use App\Entity\Serret;
use App\Entity\Accomodation;
use App\Entity\Confrontation;
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
            ->add('optotypes', EntityType::class,[
                'class' => Optotypes::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('echelle', EntityType::class,[
                'class' => Echelle::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('affichages', EntityType::class,[
                'class' => Affichages::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('distance', EntityType::class,[
                'class' => Distance::class,
                'choice_label' => 'data',
                'mapped' => false
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
            ->add('stereoscopique', EntityType::class,[
                'class' => Stereoscopique::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('stereo', EntityType::class,[
                'class' => Stereo::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('couleurs', EntityType::class,[
                'class' => Couleurs::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('couleurs2', EntityType::class,[
                'class' => Couleurs2::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('contrastes', EntityType::class,[
                'class' => Contrastes::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('SERRET', EntityType::class,[
                'class' => Serret::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('accomodation', EntityType::class,[
                'class' => Accomodation::class,
                'choice_label' => 'data',
                'mapped' => false
            ])
            ->add('confrontation', EntityType::class,[
                'class' => Confrontation::class,
                'choice_label' => 'data',
                'mapped' => false
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
