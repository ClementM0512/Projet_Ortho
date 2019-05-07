<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateDeNaissance', BirthdayType::class, [
                'label' => 'Date de naissance'
            ])
            ->add('adresse')
            ->add('classe', ChoiceType::class, [
                'choices' => [
                    'Primaire' => [
                        'PS' => 'PS',
                        'MS' => 'MS',
                        'GS' => 'GS',
                        'CP' => 'CP',
                        'CE1' => 'CE1',
                        'CE2' => 'CE2',
                        'CM1' => 'CM1',
                        'CM2' => 'CM2',
                    ],
                    'Collège' => [
                        '6ème' => '6ème',
                        '5ème' => '5ème',
                        '4ème' => '4ème',
                        '3ème' => '3ème',
                    ],
                    'Lycée' => [
                        'Général' => 'Général',
                        'Techno' => 'Techno',
                        'Pro' => 'Pro',
                    ],
                ],
            ])
            ->add('optnClasse')
            ->add('antecedent')
            ->add('autreBilan')
            ->add('charge')
            ->add('traitement')
            ->add('lateralite')
            ->add('motifs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
