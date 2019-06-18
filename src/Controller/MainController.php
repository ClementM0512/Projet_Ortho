<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\ExerciceRepository;
use App\Repository\HistoireRepository;
use App\Repository\PatientRepository;
use App\Repository\ResultatRepository;
use App\Repository\UserRepository;
use App\Repository\Bilan01Repository;
use App\Entity\Resultat;
use App\Entity\Patient;
use App\Entity\Histoire;
use App\Entity\Exercice;
use App\Form\HistoireType;
use App\Entity\User;

use App\Entity\Bilan01;

/*
 * @IsGranted("ROLE_USER")
 */
class MainController extends AbstractController
{
    /**
     * @Route("/exercices", name="listeExos")
     * @Route("/Patient/{idPatient}/exercices", name="listeExosPatient")
     * @IsGranted("ROLE_USER")
     */

    public function list_exos( int $idPatient = null, Patient $patient = null, ExerciceRepository $repo, ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
            

    
        } else {
            $patient = null;
        }

        $exercices = $repo->findAll(); // Sert � trouver tout les objets du type pass� en param


        return $this->render('main/listeExos.html.twig', [
            'exercices' => $exercices,
            'patient' => $patient,
            'bool' => true,
        ]);
    }
    
    /**
     *
     * @Route("/exercices/chronomots", name="Chronomots")
     * @Route("/Patient/{idPatient}/exercices/chronomots", name="chronomots")
     * @IsGranted("ROLE_USER")
     */
    public function chronomots(int $idPatient = null, Patient $patient = null, HistoireRepository $repo, ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
        } else {
            $patient = null;
        }
        $histoires = $repo->findAll();
        $Exercice = $repoExercice->findOneBy(['name' => 'chronomots']);
        return $this->render('main/chronomots.html.twig', [
            'controller_name' => 'MainController',
            'histoires' => $histoires,
            'patient' => $patient,
            'Exercice'=> $Exercice,
            'bool' => false,
        ]);
    }
    
    /**
     *
     * @Route("/exercices/motsoutils", name="Motsoutil")
     * @Route("/Patient/{idPatient}/exercices/motsoutils", name="motsoutil")
     * @IsGranted("ROLE_USER")
     */
    public function motsoutils(int $idPatient = null, Patient $patient = null, HistoireRepository $repoHistoire, ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
        } else {
            $patient = null;
        }
        
        $Exercice = $repoExercice->findOneBy(['name' => 'Mots-Outil']);
        return $this->render('main/motsoutil.html.twig', [
            'controller_name' => 'MainController',
            'histoires'=> $repoHistoire->findAll(),
            'patient' => $patient,
            'Exercice'=> $Exercice,
            'bool' => false,
        ]);
    }
    
    /**
     *
     * @Route("/exercices/Tracerdroit", name="Lestraits")
     * @Route("/Patient/{idPatient}/exercices/Tracerdroit", name="lestraits")
     * @IsGranted("ROLE_USER")
     */
    public function lestraits(int $idPatient = null, Patient $patient = null, HistoireRepository $repoHistoire, ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
            
        } else {
            $patient = null;
        }
        $Exercice = $repoExercice->findOneBy(['name' => 'Tracer droit']);
        return $this->render('main/lestraits.html.twig', [
            'patient' => $patient,
            'Exercice'=> $Exercice,
            'bool' => false,
        ]);
    }
    /**
     *
     * @Route("/exercices/lancaster", name="Lancaster")
     * @Route("/Patient/{idPatient}/exercices/lancaster", name="lancaster")
     * @IsGranted("ROLE_USER")
     */
    public function lancaster(int $idPatient = null, Patient $patient = null, ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
            
        } else {
            $patient = null;
        }
        $Exercice = $repoExercice->findOneBy(['name' => 'lancaster']);
        return $this->render('main/lancaster.html.twig', [
            'patient' => $patient,
            'Exercice'=> $Exercice,
            'bool' => false,
        ]);
    }
    
    /**
     *
     * @Route("/exercices/lettres", name="Lettres")
     * @Route("/Patient/{idPatient}/exercices/lettres", name="lettres")
     * @IsGranted("ROLE_USER")
     */
    public function lettres(int $idPatient = null, Patient $patient = null, ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
            
        } else {
            $patient = null;
        }
        $Exercice = $repoExercice->findOneBy(['name' => 'Lettres']);
        return $this->render('main/lettres.html.twig', [
            'patient' => $patient,
            'Exercice'=> $Exercice,
            'bool' => false,
        ]);
    }
        
        /**
         *
         * @Route("/exercices/duction", name="Duction")
         * @Route("/Patient/{idPatient}/exercices/duction", name="duction")
         */
    public function duction(int $idPatient = null, Patient $patient = null, ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
            
        } else {
            $patient = null;
        }
        $Exercice = $repoExercice->findOneBy(['name' => 'duction']);
        return $this->render('main/duction.html.twig', [
            'patient' => $patient,
            'Exercice'=> $Exercice,
            'bool' => false,
        ]);
    }
    
        /**
         *
         * @Route("/exercices/cartememoire", name="Cartememoire")
         * @Route("/Patient/{idPatient}/exercices/cartememoire", name="cartememoire")
         * @IsGranted("ROLE_USER")
         */
    public function cartememoire(int $idPatient = null, Patient $patient = null ,ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
            
        } else {
            $patient = null;
        }
        $Exercice = $repoExercice->findOneBy(['name' => 'cartememoire']);
        return $this->render('main/cartememoire.html.twig', [
            'patient' => $patient,
            'Exercice'=> $Exercice,
            'bool' => false,
        ]);
    }
        
        /**
         *
         * @Route("/exercices/poursuite", name="Poursuite")
         * @Route("/Patient/{idPatient}/exercices/poursuite", name="poursuite")
         * @IsGranted("ROLE_USER")
         */
    public function Poursuite(int $idPatient = null, Patient $patient = null, HistoireRepository $repo, ExerciceRepository $repoExercice, PatientRepository $repoPatient)
    {
        if(isset($idPatient)){
            $patient = $repoPatient->findOneBy(['id' => $idPatient]);
            
        } else {
            $patient = null;
        }
        $Exercice = $repoExercice->findOneBy(['name' => 'poursuite']);
        return $this->render('main/poursuite.html.twig', [
            'histoires'=> $repo->findAll(),
            'patient' => $patient,
            'Exercice'=> $Exercice,
            'bool' => false,
        ]);
    }
        
        /**
         *
         * @Route("/receptionajax", name="receptionajax")
         */
        public function receptionajax(HistoireRepository $repo)
        {
            $histoires = $repo->findAll();
            for ($i = 0; $i < count($histoires); $i ++) {
                $arr[$i] = $histoires[$i]->getTexte();
            }
            echo (json_encode($arr));
            return $this->render('main/sendarticle.html.twig');
        }
        /**
         *
         * @Route("/envoiajax", name="envoiajax")
         */
        public function envoieAjax(ObjectManager $manager, ExerciceRepository $repoExo, PatientRepository $repoPatient, UserRepository $repoUser, Bilan01Repository $repoBilan)
        {
            $exercice = $repoExo->find((int)$_GET['exercice']);
            $bilan = $repoBilan->find((int)$_GET['bilan']);
            $user = $repoUser->find((int)$_GET['user']);
            $patient = $repoPatient->find((int)$_GET['patient']);
            
            if ($this->getUser()) {
                $User = $this->getUser();
            }
            
            $resultat = new Resultat();
            $resultat->setIdExercice($exercice)
            ->setIdPatient($patient)
            ->setIdUser($user)
            ->setIdBilan($bilan)
            ->setScore($_GET['score']);
            
            //         echo($_GET['exercice']);
            
            $manager->persist($resultat);
            $manager->flush();
            return $this->render('main/sendarticle.html.twig');
            
        }
        /**
         *
         * @Route("/nouvellehistoire/{idPatient}", name="HistoireCreation")
         * @IsGranted("ROLE_USER")
         */
        public function createHistoire(int $idPatient = null, Patient $patient = null, Request $request, ObjectManager $manager, PatientRepository $repoPatient)
        {
            if(isset($idPatient)){
                $patient = $repoPatient->findOneBy(['id' => $idPatient]);
            } else {
                $patient = null;
            }
            $histoire = new Histoire();
            $form = $this->createFormBuilder($histoire)
            ->add('name')
            ->add('texte')
            ->add('save', SubmitType::class)
            ->getForm();
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $manager->persist($histoire);
                $manager->flush();
                return $this->redirectToRoute('listeExos');
            }
            return $this->render('main/nouvellehistoire.html.twig', [
                'formHistoire' => $form->createView()
            ]);
        }
    }
    