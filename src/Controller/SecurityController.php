<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use App\Form\NewPassType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;






class SecurityController extends AbstractController
{

    /**
     * @Route("/", name="security_login")
     */
    public function login(Request $request)
    {
       
        if ($this->getUser() != null) {                                 #on verifie si on est identifier
            if ($this->getUser()->getChangePass() == true) {            #on verifie si c'est la premiere connexion et on le redirige vers la bonne page
                return $this->redirectToRoute('security_newPassword');  #on l'envoie a la page pour changer le mot de passe
            }else {
                return $this->redirectToRoute('patients');              #on le redirige vers la list des patients
            }
        } 
        return $this->render('security/login.html.twig', [              #creation de la vue
           
        ]);
    }
    
    
    /**
     * @Route("/register", name="security_register")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {
        $user = new User();                                                     #on cree un nouveau utilisateur
        $form = $this->createForm(UserType::class);                             #on cree un formulaire avec la classe UserType
        $form->handleRequest($request);                                         #on recupere les donne entrer dans le formulaire
        
        if ($form->isSubmitted() && $form->isValid()) {                         #on verifie la validiter du formulaire
            
            $repo = $this->getDoctrine()->getRepository(User::class);           #on recherche si il y a deja un utilisateur qui porte le meme $Username
            $compare = $repo->findOneBy(['Username' => $form->getData()['Username']]);
            if ($compare) {
                return $this->render('security/register.html.twig', [           #creation de la vue
                    'formUser' => $form->createView(),                          #parametre envoyer pour cree la vue
                    'Message'  => 'ce nom est deja utilise',                   #Mesage d'erreur
                ]);
            }
            $user->setUsername($form->getData()['Username']);                   #on remplie les champs d'utilisateur avec les donnes du formulaire
            $user->setEmail($form->getData()['Email']);
            $user->setRoles(array($form->getData()['Roles']));
            $user->setChangePass(true);                                         #on definie sur true car il devra obligatoirement changer le mot de passe lors de sa premiere connexion
            
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';         #création d'un mot de passe randome
            $longueurMax = strlen($caracteres);
            $chaineAleatoire = '';
            $longueur = 10;
            for ($i = 0; $i < $longueur; $i++)
            {
                $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
            }

            $message = (new \Swift_Message('bienvenue voici votre mot de passe'))
            ->setFrom('bougetesyeux@gmail.com')
            ->setTo($user->getEmail())
            ->setBody($chaineAleatoire,'text')
            ;
            $mailer->send($message);
            
            $encoded = $encoder->encodePassword($user, $chaineAleatoire);   #on definie le mot de passe temporaire du compte
            $user->setPassword($encoded);
            
            $entityManager = $this->getDoctrine()->getManager();                #on eregistre l'utilisateur sur la base donnee
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('security_login');                    #on l'envoie a la page login
        }
        
        return $this->render('security/register.html.twig', [                   #creation de la vue
            'formUser' => $form->createView(),                                  #parametre envoyer pour cree la vue
            'Message'  => '',
        ]);
    }
    
    /**
     * @Route("/newPassword", name="security_newPassword")
     */
    public function newPass(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $id = $this->getUser()->getId();                                                            #on recupere l'id du compte dans la base de donnee
        $repo = $this->getDoctrine()->getRepository(User::class);                                   #on recherche la fiche complete de l'utilisateur
        $user = $repo->find($id);                                                                   #on met la fiche dans la variable $user
        $form = $this->createForm(NewPassType::class);                                              #creation du formulaire pour changer les mot de passe
        
        
        $form->handleRequest($request);                                                             #on recupere les donnees du formulaire
        if ($form->isSubmitted() && $form->isValid()) {                                             #on verifie la validiter du formulaire
            
            $ispasswordValid = $encoder->isPasswordValid($user, $form->getData()['oldPass']);       #on verifie que l'acien mot de passe correspond
            if ($ispasswordValid) {                                                                 #si il est valide
                
                if ($form->getData()['newPass'] == $form->getData()['newPassconfirm']) {            #on verifie que le mot de passe soit ecrie 2 fois a l'identique
                    
                    $encoded = $encoder->encodePassword($user, $form->getData()['newPass']);        #on crypt le mot de passe
                    $user->setPassword($encoded);                                                   #on change le mot de passe dans la fiche
                    $user->setChangePass(false);                                                    #on annule le faite que l'utilisateur doit changer le mot de passe a la prochaine connexion
                    
                    $entityManager = $this->getDoctrine()->getManager();                            #on synchronise les donnes avec la base de donnee
                    $entityManager->persist($user);
                    $entityManager->flush();
                                        
                    return $this->redirectToRoute('patients');                                      #on le redirige vers la list des patients
                    
                }else {
                    return $this->render('security/newPass.html.twig', [                            #on evoie la vue avec le formulaire et le message d'erreur
                        'formPass' => $form->createView(),
                        'message' => 'ce n\'est pas les memes mots de passe',
                    ]);
                }
            }else {
                return $this->render('security/newPass.html.twig', [                                #on evoie la vue avec le formulaire et le message d'erreur
                    'formPass' => $form->createView(),
                    'message' => 'ce n\'est pas l\'ancien mot de passe',
                ]);
            }
        }
        return $this->render('security/newPass.html.twig', [                                        #on evoie la vue avec le formulaire et le message d'erreur
            'formPass' => $form->createView(),
            'message' => null,
        ]);
    }
     
    /**
     * @Route("/recuperation_motdepass", name="security_recup")
     */
    public function recuperation(){                           
        
    }
    
    
    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout(){                           #permet la deconexion de l'utilisateur
                                                        #symfony gere tout seul
    }
}
