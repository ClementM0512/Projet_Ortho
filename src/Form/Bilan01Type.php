<?php

namespace App\Form;

use App\Entity\Bilan01;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Bilan01Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('corrections')
            ->add('allC')
            ->add('optotypes')
            ->add('echelle')
            ->add('affichages')
            ->add('distance')
            ->add('allVL')
            ->add('allVP')
            ->add('allPO')
            ->add('stereoscopique')
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
