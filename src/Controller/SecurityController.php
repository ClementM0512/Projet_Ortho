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
        
        if ($this->getUser() != null) {                                 #on v�rifie si on est identifier
            if ($this->getUser()->getChangePass() == true) {            #on verifie si c'est �a premiere connexion et on le redirige ver la bonne page
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
    public function registration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();                                             #on cr�e un nouveau utilisateur
        $form = $this->createForm(UserType::class);                     #on cr�e un formulaire avec la classe UserType
        $form->handleRequest($request);                                 #on r�cupere les donn� entrer dans le formulaire
        
        if ($form->isSubmitted() && $form->isValid()) {                 #on verifie la validiter du formulaire
            
            $user->setUsername($form->getData()['Username']);           #on remplie les champs d'utilisateur avec les donn�s du formulaire
            $user->setEmail($form->getData()['Email']);
            $user->setRoles(array($form->getData()['Roles']));
            $user->setChangePass(true);                                 #on definie sur true car il devra obligatoirement changer le mot de passe lors de sa premiere connexion
            
            
            $encoded = $encoder->encodePassword($user, '123456789');    #on definie le mot de passe temporaire du compte
            $user->setPassword($encoded);
            
            
            $entityManager = $this->getDoctrine()->getManager();        #on eregistre l'utilisateur sur la base donn�e
            $entityManager->persist($user);
            $entityManager->flush();
            
        }
        
        return $this->render('security/register.html.twig', [           #cr�ation de la vue
            'formUser' => $form->createView(),                          #parametre envoyer pour cr�e la vue
        ]);
    }
    
    /**
     * @Route("/newPassword", name="security_newPassword")
     */
    public function newPass(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $id = $this->getUser()->getId();                                                            #on recupere l'id du compte dans la base de donn�e
        $repo = $this->getDoctrine()->getRepository(User::class);                                   #on recherche la fiche complete de l'utilisateur
        $user = $repo->find($id);                                                                   #on met la fiche dans la variable $user
        $form = $this->createForm(NewPassType::class);                                              #cr�ation du formulaire pour changer les mot de passe
        
        
        $form->handleRequest($request);                                                             #on r�cupere les donn�es du formulaire
        if ($form->isSubmitted() && $form->isValid()) {                                             #on verifie la validiter du formulaire
            
            $ispasswordValid = $encoder->isPasswordValid($user, $form->getData()['oldPass']);       #on verifie que l'acien mot de passe correspond
            //             $encoded = $encoder->encodePassword($user, $form->getData()['oldPass']);
            if ($ispasswordValid) {                                                                 #si il est valide
                
                if ($form->getData()['newPass'] == $form->getData()['newPassconfirm']) {            #on verifie que le mot de passe soit ecrie 2 fois a l'identique
                    
                    $encoded = $encoder->encodePassword($user, $form->getData()['newPass']);        #on crypt le mot de passe
                    $user->setPassword($encoded);                                                   #on change le mot de passe dans la fiche
                    $user->setChangePass(false);                                                    #on annule le faite que l'utilisateur doit changer le mot de passe a la prochaine connexion
                    
                    $entityManager = $this->getDoctrine()->getManager();                            #on synchronise les donn� avec la base de donn�e
                    $entityManager->persist($user);
                    $entityManager->flush();
                    
                    
                    return $this->redirectToRoute('patients');                                      #on le redirige vers la list des patients
                    
                }else {
                    return $this->render('security/newPass.html.twig', [                            #on evoie la vue avec le formulaire et le message d'erreur
                        'formPass' => $form->createView(),
                        'message' => 'ce n\'est pas les meme mot de passe',
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
     * @Route("/logout", name="security_logout")
     */
    public function logout(){                           #permet la deconexion de l'utilisateur
        #symfony gere tout seul
    }
}