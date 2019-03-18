<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    
    /**
     * @Route("/", name="security_login")
     */
    public function login()
    {
        return $this->render('security/login.html.twig', [
        ]);
    }
    
    
    /**
     * @Route("/register", name="security_register")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $user->setUsername($form->getData()['Username']);
            $user->setEmail($form->getData()['Email']);
            $user->setRoles(array($form->getData()['Roles']));
            $user->setChangePass(true);
            
           
            $encoded = $encoder->encodePassword($user, '123456789');
            $user->setPassword($encoded);
            
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            
        }
        
        return $this->render('security/register.html.twig', [
            'formUser' => $form->createView(),
        ]);
    }
    
        
   
}
