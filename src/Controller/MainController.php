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
use App\Repository\BilanRepository;
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
     *
     * @Route("/Patient/{idPatient}/exercices", name="listeExosPatient")
     * @Route("/exercices", name="listeExos")
     * @IsGranted("ROLE_USER")
     */
    public function list_exos($idPatient = null, Patient $patient = null, ExerciceRepository $repo, ExerciceRepository $repoExercice)
    {
        
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        $exercices = $repo->findAll(); // Sert � trouver tout les objets du type pass� en param
        // dd($exercices);
        return $this->render('main/listeExos.html.twig', [
            'controller_name' => 'MainController',
            'exercices' => $exercices,
            'idPatient' => $idPatient,
            'idUser' => $idUser,
            'idExercice'=> null,
            'bool' => true,
        ]);
    }
    /**
     *
     * @Route("/exercices/chronomots", name="chronomots")
     * @Route("/Patient/{idPatient}/exercices/chronomots", name="chronomotsAP")
     * @IsGranted("ROLE_USER")
     */
    public function chronomots(Patient $patient = null, HistoireRepository $repo, ExerciceRepository $repoExercice)
    {
        if (isset($_GET['idPatient'])) {
            $idPatient = $_GET['idPatient'];
        } else {
            $idPatient = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        $histoires = $repo->findAll();
        $idExercice = $repoExercice->findOneBy(['name' => 'lestraits']);
        return $this->render('main/chronomots.html.twig', [
            'controller_name' => 'MainController',
            'histoires' => $histoires,
            'idPatient' => $idPatient,
            'idUser' => $idUser,
            'idExercice'=> $idExercice->getId(),
            'bool' => false,
        ]);
    }
    
    /**
     *
     * @Route("/exercices/motsoutils", name="motsoutil")
     * @Route("/Patient/{idPatient}/exercices/motsoutils", name="motsoutilsAP")
     * @IsGranted("ROLE_USER")
     */
    public function motsoutils(Patient $patient = null, HistoireRepository $repo, ExerciceRepository $repoExercice)
    {
        if(isset($_GET['idPatient'])){
            $idPatient = $_GET['idPatient'];
        } else {
            $idPatient = 0;
        }
        $idUser = 0;
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        $histoires = $repo->findAll();
        $idExercice = $repoExercice->findOneBy(['name' => 'Mots-Outil']);
        return $this->render('main/motsoutil.html.twig', [
            'controller_name' => 'MainController',
            'histoires' => $histoires,
            'idPatient' => $idPatient,
            'idUser' => $idUser,
            'idExercice'=> $idExercice->getId(),
            'bool' => false,
        ]);
    }
    
    /**
     *
     * @Route("/exercices/Tracerdroit", name="lestraits")
     * @Route("/Patient/{idPatient}/exercices/Tracerdroit", name="lestraitsAP")
     * @IsGranted("ROLE_USER")
     */
    public function lestraits(Patient $patient = null, HistoireRepository $repoHistoire, ExerciceRepository $repoExercice)
    {
        if(isset($_GET['idPatient'])){
            $idPatient = $_GET['idPatient'];
        } else {
            $idPatient = 0;
        }
        $idUser = 0;
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        $idExercice = $repoExercice->findOneBy(['name' => 'lestraits']);
        return $this->render('main/lestraits.html.twig', [
            'idPatient' => $idPatient,
            'idUser' => $idUser,
            'idExercice'=> $idExercice->getId(),
            'bool' => false,
        ]);
    }
    /**
     *
     * @Route("/exercices/lancaster", name="lancaster")
     * @Route("/Patient/{idPatient}/exercices/lancaster", name="lancasterAP")
     * @IsGranted("ROLE_USER")
     */
    public function lancaster(Patient $patient = null, ExerciceRepository $repoExercice)
    {
        if(isset($_GET['idPatient'])){
            $idPatient = $_GET['idPatient'];
        } else {
            $idPatient = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        $idExercice = $repoExercice->findOneBy(['name' => 'lancaster']);
        return $this->render('main/lancaster.html.twig', [
            'controller_name' => 'MainController',
            'idPatient' => $idPatient,
            'idUser' => $idUser,
            'idExercice'=> $idExercice->getId(),
            'bool' => false,
        ]);
    }
    
    /**
     *
     * @Route("/exercices/lettres", name="lettres")
     * @Route("/Patient/{idPatient}/exercices/lettres", name="lettresAP")
     * @IsGranted("ROLE_USER")
     */
    public function lettres(Patient $patient = null, ExerciceRepository $repoExercice)
    {
        //         if(isset($_GET['idPatient'])){
        //             $idPatient = $_GET['idPatient'];
        //         } else {
        //             $idPatient = 0;
        //         }
        //         if ($this->getUser()) {
        //             $idUser = $this->getUser()->getid();
        //         }
        //         else
            //         {
            //             $idUser=0;
            //         }
        $idExercice = $repoExercice->findOneBy(['name' => 'lettres']);
        return $this->render('main/lettres.html.twig', [
            'controller_name' => 'MainController',
            //             'idPatient' => $idPatient,
        //             'idUser' => $idUser,
        //             'idExercice'=> $idExercice->getId(),
        ]);
    }
    

    /**
     *
     * @Route("/exercices/duction", name="duction")
     * @Route("/Patient/{idPatient}/exercices/duction", name="ductionAP")
     */
    public function duction(Patient $patient = null, ExerciceRepository $repoExercice)
    {
        if(isset($_GET['idPatient'])){
            $idPatient = $_GET['idPatient'];
        } else {
            $idPatient = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        $idExercice = $repoExercice->findOneBy(['name' => 'duction']);
        return $this->render('main/duction.html.twig', [
            'controller_name' => 'MainController',
            'idPatient' => $idPatient,
            'idUser' => $idUser,
            'idExercice'=> $idExercice->getId(),
            'bool' => false,
        ]);
    }
    /**
     *
     * @Route("/exercices/cartememoire", name="cartememoire")
     * @Route("/Patient/{idPatient}/exercices/cartememoire", name="cartememoireAP")
     * @IsGranted("ROLE_USER")
     */
    public function cartememoire(Patient $patient = null ,ExerciceRepository $repoExercice)
    {
        if(isset($_GET['idPatient'])){
            $idPatient = $_GET['idPatient'];
        } else {
            $idPatient = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        $idExercice = $repoExercice->findOneBy(['name' => 'cartememoire']);
        return $this->render('main/cartememoire.html.twig', [
            'controller_name' => 'MainController',
            'idPatient' => $idPatient,
            'idUser' => $idUser,
            'idExercice'=> $idExercice->getId(),
            'bool' => false,
        ]);
    }
    
    /**
     *
     * @Route("/exercices/poursuite", name="poursuite")
     * @Route("/Patient/{idPatient}/exercices/poursuite", name="poursuiteAP")
     * @IsGranted("ROLE_USER")
     */
    public function Poursuite(Patient $patient = null, HistoireRepository $repo, ExerciceRepository $repoExercice)
    {
        if (isset($_GET['idPatient'])) {
            $idPatient = $_GET['idPatient'];
        } else {
            $idPatient = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        $histoires = $repo->findAll();
        $idExercice = $repoExercice->findOneBy(['name' => 'poursuite']);
        return $this->render('main/poursuite.html.twig', [
            'controller_name' => 'MainController',
            'histoires' => $histoires,
            'idPatient' => $idPatient,
            'idUser' => $idUser,
            'idExercice'=> $idExercice->getId(),
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
    public function envoieAjax(ObjectManager $manager, ExerciceRepository $repoExo, PatientRepository $repoPatient, UserRepository $repoUser, BilanRepository $repoBilan)
    {
        $exercice = $repoExo->find((int)$_GET['exercice']);
        $bilan = $repoBilan->find((int)$_GET['bilan']);
        $user = $repoUser->find((int)$_GET['user']);
        $patient = $repoPatient->find((int)$_GET['patient']);
        
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
     * @Route("/nouvellehistoire", name="HistoireCreation")
     * @IsGranted("ROLE_USER")
     */
    public function createHistoire(Request $request, ObjectManager $manager)
    {
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