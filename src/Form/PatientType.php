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
            ->add('charge', ChoiceType::class,[
                'choices' => [
                    'orthophonie' => 'orthophonie',
                    'psychomotricité' => 'psychomotricité',
                    'psychologie' => 'psychologie',
                    'neuro-psychologie' => 'psychologie',
                    'ergothérapie' => 'ergothérapie',
                ],
            ])
            ->add('precision', ChoiceType::class,[
                'choices' => [
                    'SESSAD' => 'SESSAD',
                    'IME' => 'IME',
                    'CMP' => 'CMP',
                ],
               'mapped' => false,
            ])
            ->add('traitement')
            ->add('lateralite', ChoiceType::class,[
                'choices' => [
                    'Droitier' => 'Droitier',
                    'Gaucher' => 'Gaucher',
                    'Non-defini' => 'Non-defini',
                ],
            ])
            ->add('textmotifs', ChoiceType::class,[
                'choices' => [
                    ' ' => '',
                    'Sur demmande de l\'ophtalmologiste, de l\'ORL, du neurologue.' => 'Sur demmande de l\'ophtalmologiste, de l\'ORL, du neurologue.',
                    'En rapport à des troubles du neuro-développement, TSA, DYS.' => 'En rapport à des troubles du neuro-développement, TSA, DYS.',
                    'En rapport à des difficultés dans l\'apprentissages et à l\'école, attention, concentration, lecture, retranscription.' => 'En rapport à des difficultés dans l\'apprentissages et à l\'école, attention, concentration, lecture, retranscription.',
                    'Par rapport à des signe fonctionnels : céphalées, vision double, vision trouble, clignement, position vicieuse de la tête, larmoiement.' => 'Par rapport à des signe fonctionnels : céphalées, vision double, vision trouble, clignement, position vicieuse de la tête, larmoiement.',

                ],
                'mapped' => false,
            ])
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
