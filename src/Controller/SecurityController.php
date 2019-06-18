<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Security;
use App\Entity\Permission;
use App\Form\UserType;
use App\Form\NewPassType;
use App\Form\ForgotPassType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use App\Repository\UserRepository;

class SecurityController extends AbstractController
{

    /**
     *
     * @Route("/", name="security_login")
     */
    public function login(Request $request)
    {
        if ($this->getUser() != null) { // on verifie si on est identifier
            if ($this->getUser()
                ->getSecurity()
                ->getChangePass() == true) { // on verifie si c'est la premiere connexion et on le redirige vers la bonne page
                return $this->redirectToRoute('security_newPassword'); // on l'envoie a la page pour changer le mot de passe
            } else {
                return $this->redirectToRoute('patients'); // on le redirige vers la list des patients
            }
        }
        return $this->render('security/login.html.twig', [ // creation de la vue
        ]);
    }

    /**
     *
     * @Route("/register", name="security_register")
     * @IsGranted("ROLE_SUPERADMIN")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer, AuthorizationCheckerInterface $authChecker)
    {
        $form = $this->createForm(UserType::class); // on cree un formulaire avec la classe UserType
        $form->handleRequest($request); // on recupere les donne entrer dans le formulaire

        if ($form->isSubmitted() && $form->isValid()) { // on verifie la validiter du formulaire

            $repo = $this->getDoctrine()->getRepository(User::class);
            $compare = $repo->findOneBy([
                'Username' => $form->getData()['Username']
            ]); // on recherche si il y a deja un utilisateur qui porte le meme $Username

            if ($compare) {
                $this->addFlash('danger', 'ce nom est déjà utilisé');
                return $this->render('security/register.html.twig', [
                    'formUser' => $form->createView()
                ]);
            }
            // ////////////////////////////////////////////////////////////////////////////////////////////////////////
            $user = new User();
            $user->setUsername($form->getData()['Username']); // on remplie les champs d'utilisateur avec les donnes du formulaire
            $user->setEmail($form->getData()['Email']);
            $user->setNom($form->getData()['Nom']);
            $user->setPrenom($form->getData()['Prenom']);

            $permision = new Permission();
            $security = new Security();

            $permision->setRoles(array(
                $form->getData()['Roles']
            ));
            if ($form->getData()['Roles'] == 'ROLE_ADMIN') {
                $permision->setRoles(array(
                    'ROLE_ADMIN',
                    'ROLE_USER'
                ));
            } elseif ($form->getData()['Roles'] == 'ROLE_SUPERADMIN') {
                $permision->setRoles(array(
                    'ROLE_SUPERADMIN',
                    'ROLE_ADMIN',
                    'ROLE_USER'
                ));
            }

            $user->setPermission($permision);
            // ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ'; // création d'un mot de passe randome
            $longueurMax = strlen($caracteres);
            $chaineAleatoire = '';
            $longueur = 10;
            for ($i = 0; $i < $longueur; $i ++) {
                $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
            }

            $message = (new \Swift_Message('bienvenue voici votre mot de passe'))->setFrom('bougetesyeux@gmail.com')
                ->setTo($user->getEmail())
                ->setBody($chaineAleatoire, 'text');
            $mailer->send($message);
            // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $encoded = $encoder->encodePassword($user, $chaineAleatoire); // on definie le mot de passe temporaire du compte
            $security->setPassword($encoded);
            $security->setChangePass(true); // on definie sur true car il devra obligatoirement changer le mot de passe lors de sa premiere connexion

            $user->setSecurity($security);
            // ///////////////////////////////////////////////////
            $entityManager = $this->getDoctrine()->getManager(); // on eregistre l'utilisateur sur la base donnee
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('security_login'); // on l'envoie a la page login
        }

        return $this->render('security/register.html.twig', [ // creation de la vue
            'formUser' => $form->createView() // parametre envoyer pour cree la vue
        ]);
    }

    /**
     *
     * @Route("/admin", name="security_admin")
     * @IsGranted("ROLE_SUPERADMIN")
     */
    public function admin(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $listusers = $repo->findAll();

        $form = $this->createFormBuilder()
            ->add('Recherche', SearchType::class, [
            'required' => false
        ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resultat = $form->getData()['Recherche'];
            if (! $resultat) {
                return $this->render('security/gestion.html.twig', [ // creation de la vue
                    'Users' => $listusers, // on passe tout les utilisateur pour la gestion
                    'form' => $form->createView(),
                    'rechercheResultat' => null
                ]);
            }

            // //////////////////////////////////////////////////////////////////////////////RECHERCHE DES UTILISATEUR////////////////
            $rechercheResultatsNom = $repo->loadByElementBegin('Nom', $resultat); // Les trois lignes sont des requêtes personnalisées
            $rechercheResultatsPrenom = $repo->loadByElementBegin('Prenom', $resultat); // Elles récupèrent tout les champs commencant par $rechercheResultats = [];
            $testPositif = 0;
            $rechercheResultats = [];

            foreach ($rechercheResultatsNom as $recherche) {
                $rechercheResultats[] = $recherche;
            }
            foreach ($rechercheResultatsPrenom as $recherche) {
                foreach ($rechercheResultats as $compareId) {
                    if ($recherche->getId() == $compareId->getId()) {
                        $testPositif = 1;
                    }
                }
                $testPositif ? $testPositif = 0 : $rechercheResultats[] = $recherche;
            }
            if ($rechercheResultats == null) {
                goto listeUser;
            }
            if (! $resultat) {
                listeUser:
                $rechercheResultats = $repo->findAll();
            }
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if ($rechercheResultats == null) {
                $this->addFlash('danger', 'pas de resultat, incomplet ou innexistant');
                return $this->render('security/gestion.html.twig', [
                    'Users' => null,
                    'form' => $form->createView(),
                    'rechercheResultat' => $rechercheResultats
                ]);
            }
            return $this->render('security/gestion.html.twig', [
                'Users' => null,
                'form' => $form->createView(),
                'rechercheResultat' => $rechercheResultats
            ]);
        }
        return $this->render('security/gestion.html.twig', [ // creation de la vue
            'Users' => $listusers, // on passe tout les utilisateur pour la gestion
            'form' => $form->createView(),
            'rechercheResultat' => null
        ]);
    }

    /**
     *
     * @Route("/newPassword", name="security_newPassword")
     * @IsGranted("ROLE_USER")
     */
    public function newPass(Request $request, UserPasswordEncoderInterface $encoder, AuthorizationCheckerInterface $authChecker)
    {
        $id = $this->getUser()->getId(); // on recupere l'id du compte dans la base de donnee
        $repo = $this->getDoctrine()->getRepository(User::class); // on recherche la fiche complete de l'utilisateur
        $user = $repo->find($id); // on met la fiche dans la variable $user
        $form = $this->createForm(NewPassType::class); // creation du formulaire pour changer les mot de passe

        $form->handleRequest($request); // on recupere les donnees du formulaire
        if ($form->isSubmitted() && $form->isValid()) { // on verifie la validiter du formulaire

            $ispasswordValid = $encoder->isPasswordValid($user, $form->getData()['oldPass']); // on verifie que l'acien mot de passe correspond
            if ($ispasswordValid) { // si il est valide

                if ($form->getData()['newPass'] == $form->getData()['newPassconfirm']) { // on verifie que le mot de passe soit ecrie 2 fois a l'identique

                    $encoded = $encoder->encodePassword($user, $form->getData()['newPass']); // on crypt le mot de passe
                    $user->getSecurity()->setPassword($encoded); // on change le mot de passe dans la fiche
                    $user->getSecurity()->setChangePass(false); // on annule le faite que l'utilisateur doit changer le mot de passe a la prochaine connexion

                    $entityManager = $this->getDoctrine()->getManager(); // on synchronise les donnes avec la base de donnee
                    $entityManager->persist($user);
                    $entityManager->flush();

                    return $this->redirectToRoute('patients'); // on le redirige vers la list des patients
                } else {
                    $this->addFlash('danger', 'les mots de passe ne sont pas identique');
                    return $this->render('security/newPass.html.twig', [ // on evoie la vue avec le formulaire et le message d'erreur
                        'formPass' => $form->createView()
                    ]);
                }
            } else {
                $this->addFlash('danger', 'ce n\'est pas l\'ancien mot de passe');
                return $this->render('security/newPass.html.twig', [ // on evoie la vue avec le formulaire et le message d'erreur
                    'formPass' => $form->createView()
                ]);
            }
        }
        return $this->render('security/newPass.html.twig', [ // on evoie la vue avec le formulaire et le message d'erreur
            'formPass' => $form->createView()
        ]);
    }

    /**
     *
     * @Route("/forgotPassword", name="security_recup")
     */
    public function recuperation(Request $request, \Swift_Mailer $mailer, UserPasswordEncoderInterface $encoder)
    {
        $form = $this->createForm(ForgotPassType::class); // creation du formulaire pour changer les mot de passe
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $repo = $this->getDoctrine()->getRepository(User::class); // on recherche la fiche complete de l'utilisateur
            $user = $repo->findOneBy([
                'Username' => $form->getData()['username'],
                'Email' => $form->getData()['email']
            ]);
            // ///////////////////////////////////////////////////////////////////////////////////////////////////

            if ($user == null) {
                $this->addFlash('danger', 'ce compte n\'existe pas reverifié les champs');
                return $this->render('security/forgotPass.html.twig', [ // on evoie la vue avec le formulaire et le message d'erreur
                    'formforgot' => $form->createView()
                ]);
            }
            // ///////////////////////////////////////////////////////////////////////////////////////////////////

            if ($user->getSecurity()->getChangePass() == true) {
                $this->addFlash('danger', 'mot de passe déjà envoyé');
                return $this->redirectToRoute('security_login');
            }
            // /////////////////////////////////////////////////////////////////////////////////////////////////
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $longueurMax = strlen($caracteres);
            $chaineAleatoire = '';
            $longueur = 10;
            for ($i = 0; $i < $longueur; $i ++) {
                $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
            }

            $message = (new \Swift_Message('Voici votre nouveau mot de passe'))->setFrom('bougetesyeux@gmail.com')
                ->setTo($user->getEmail())
                ->setBody($chaineAleatoire, 'text');
            $mailer->send($message);
            // ///////////////////////////////////////////////////////////////////////////////////////////////////
            $encoded = $encoder->encodePassword($user, $chaineAleatoire); // on definie le mot de passe temporaire du compte
            $user->getSecurity()->setPassword($encoded);
            $user->getSecurity()->setChangePass(true);
            // ///////////////////////////////////////////////////////////////////////////////////////////////////
            $entityManager = $this->getDoctrine()->getManager(); // on synchronise les donnes avec la base de donnee
            $entityManager->persist($user);
            $entityManager->flush();
            // ///////////////////////////////////////////////////////////////////////////////////////////////////
            return $this->redirectToRoute('security_login'); // on l'envoie a la page login
        }
        return $this->render('security/forgotPass.html.twig', [ // on evoie la vue avec le formulaire et le message d'erreur
            'formforgot' => $form->createView()
        ]);
    }

    /**
     *
     * @Route("/gestionuser/{id}/edit", name="security_userEdit")
     * @IsGranted("ROLE_SUPERADMIN")
     */
    public function EditUser(User $user, Request $request)
    {
        $form = $this->createForm(UserType::class); // creation du formulaire pour changer les mot de passe
        $form->handleRequest($request);

        // ///////////////////////////////////////////////////////////////////////////////////////////////////

        $repo = $this->getDoctrine()->getRepository(User::class); // on recherche la fiche complete de l'utilisateur
        $usertest = $repo->find($user->getId());

        $role = $usertest->getPermission()->getRoles();
        $nbroles = count($role);

        if ($form->isSubmitted() && $form->isValid()) {

            $repo = $this->getDoctrine()->getRepository(User::class);
            $compare = $repo->findOneBy([
                'Username' => $form->getData()['Username']
            ]); // on recherche si il y a deja un utilisateur qui porte le meme $Username

            if ($compare != null && $compare != $user) {
                $this->addFlash('danger', 'ce pseudonyme existe déjà');
                return $this->render('security/gestionuser.html.twig', [ // creation de la vue
                    'form' => $form->createView(),
                    'user' => $user,
                    'role' => $nbroles
                ]);
            }
            // ///////////////////////////////////////////////////////////////////////////////////////////////////
            $user->setUsername($form->getData()['Username']); // on remplie les champs d'utilisateur avec les donnes du formulaire
            $user->setEmail($form->getData()['Email']);
            $user->setNom($form->getData()['Nom']);
            $user->setPrenom($form->getData()['Prenom']);
                       
            $user->getPermission()->setRoles(array(
                $form->getData()['Roles']
            ));
            if ($form->getData()['Roles'] == 'ROLE_ADMIN') {
                $user->getPermission()->setRoles(array(
                    'ROLE_ADMIN',
                    'ROLE_USER'
                ));
            } elseif ($form->getData()['Roles'] == 'ROLE_SUPERADMIN') {
                $user->getPermission()->setRoles(array(
                    'ROLE_SUPERADMIN',
                    'ROLE_ADMIN',
                    'ROLE_USER'
                ));
            }
            
            /////////////////////////////////////////////////////////////////////////////////////////////////
            $entityManager = $this->getDoctrine()->getManager(); // on synchronise les donnes avec la base de donnee
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('security_admin');
        }

        return $this->render('security/gestionuser.html.twig', [ // on evoie la vue avec le formulaire et le message d'erreur
            'form' => $form->createView(),
            'user' => $user,
            'role' => $nbroles
        ]);
    }

    /**
     *
     * @Route("/deleteUser/{id}", name="security_DeleteUser")
     * @IsGranted("ROLE_SUPERADMIN")
     */
    public function deleteuser(User $user, Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('Delete', SubmitType::class, [
            'label' => 'OUI, supprimer cet utilisateur',
            'attr' => [
                'class' => 'btn btn-danger btn-confirm'
            ]
        ])
            ->add('NoDelete', SubmitType::class, [
            'label' => 'Annuler',
            'attr' => [
                'class' => 'btn btn-primary btn-confirm'
            ]
        ])
            ->getForm();

        $form->handleRequest($request);
        
        if (($form->getClickedButton() && 'Delete' === $form->getClickedButton()->getName())) {
            // ///////////////////////////////////////////////////////////////////////////////////////////////////
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user); // Pour supprimer l'utilisateur.
            $entityManager->flush();
            // ///////////////////////////////////////////////////////////////////////////////////////////////////

            return $this->redirectToRoute('security_admin');
        }
        if (($form->getClickedButton() && 'NoDelete' === $form->getClickedButton()->getName())) {
            return $this->redirectToRoute('security_userEdit', [
                'id' => $user->getId()
            ]);
        }
        return $this->render('main/validation.html.twig', array(
            'action' => $form->createView(),
            'patient' => null,
            'user' => $user,
        ));
    }

    /**
     *
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    { // permet la deconexion de l'utilisateur
      // symfony gere tout seul
    }
}
