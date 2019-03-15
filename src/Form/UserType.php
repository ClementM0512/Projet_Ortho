<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Email', EmailType::class)
            ->add('Username')
            ->add('Password',PasswordType::class)
            //->add('ChangePass')
            ->add('Roles', ChoiceType::class, [
                'choices'  => [
                    'Standard' =>'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                    'SuperAdmin'=> 'ROLE_SUPERADMIN' 
                ],
            ],
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
//             'data_class' => User::class,
        ]);
    }
}
