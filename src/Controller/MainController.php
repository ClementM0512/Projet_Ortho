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
use App\Entity\Bilan;
/*
 * @IsGranted("ROLE_USER")
 */
class MainController extends AbstractController
{
    /**
     *
     * @Route("/Patient/{id}/exercices", name="listeExosPatient")
     * @Route("/exercices", name="listeExos")
     */
    public function list_exos(Patient $patient = null, ExerciceRepository $repo)
    {
        
        $id = 0;
        // echo($_GET['id']);
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        //         if ($patient) {
        //             $id = $patient->getId();
        //         } else {
        //             $id = 0;
        //         }
        // dd($patient->getId());
        $exercices = $repo->findAll(); // Sert � trouver tout les objets du type pass� en param
        // dd($exercices);
        return $this->render('main/listeExos.html.twig', [
            'controller_name' => 'MainController',
            'exercices' => $exercices,
            'id' => $id,
            'idUser' => $idUser
        ]);
    }
    /**
     *
     * @Route("/exercices/chronomots", name="chronomots")
     * @Route("/Patient/{id}/exercices/chronomots", name="chronomotsAP")
     */
    public function chronomots(Patient $patient = null, HistoireRepository $repo)
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        $histoires = $repo->findAll();
        return $this->render('main/chronomots.html.twig', [
            'controller_name' => 'MainController',
            'histoires' => $histoires,
            'id' => $id,
            'idUser' => $idUser
        ]);
    }
    
    /**
     *
     * @Route("/exercices/motsoutils", name="motsoutil")
     * @Route("/Patient/{id}/exercices/motsoutils", name="motsoutilsAP")
     */
    public function motsoutils(Patient $patient = null, HistoireRepository $repo)
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        $idUser = 0;
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        $histoires = $repo->findAll();
        return $this->render('main/motsoutil.html.twig', [
            'controller_name' => 'MainController',
            'histoires' => $histoires,
            'id' => $id,
            'idUser' => $idUser
        ]);
    }
    
    /**
     *
     * @Route("/exercices/lestraits", name="lestraits")
     * @Route("/Patient/{id}/exercices/lestraits", name="lestraitsAP")
     */
    public function lestraits(Patient $patient = null, HistoireRepository $repo)
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        $idUser = 0;
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        return $this->render('main/lestraits.html.twig', [
            'id' => $id,
            'idUser' => $idUser
        ]);
    }
    /**
     *
     * @Route("/exercices/lancaster", name="lancaster")
     * @Route("/Patient/{id}/exercices/lancaster", name="lancasterAP")
     */
    public function lancaster(Patient $patient = null)
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        return $this->render('main/lancaster.html.twig', [
            'controller_name' => 'MainController',
            'id' => $id,
            'idUser' => $idUser
        ]);
    }
    /**
     *
     * @Route("/exercices/duction", name="duction")
     * @Route("/Patient/{id}/exercices/duction", name="ductionAP")
     */
    public function duction(Patient $patient = null)
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        return $this->render('main/duction.html.twig', [
            'controller_name' => 'MainController',
            'id' => $id,
            'idUser' => $idUser
        ]);
    }
    /**
     *
     * @Route("/exercices/cartememoire", name="cartememoire")
     * @Route("/Patient/{id}/exercices/cartememoire", name="cartememoireAP")
     */
    public function cartememoire(Patient $patient = null)
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        return $this->render('main/cartememoire.html.twig', [
            'controller_name' => 'MainController',
            'id' => $id,
            'idUser' => $idUser
        ]);
    }
    
        /**
     *
     * @Route("/exercices/poursuite", name="poursuite")
     * @Route("/Patient/{id}/exercices/poursuite", name="poursuiteAP")
     */
    public function Poursuite(Patient $patient = null, HistoireRepository $repo)
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        if ($this->getUser()) {
            $idUser = $this->getUser()->getid();
        }
        else
        {
            $idUser=0;
        }
        $histoires = $repo->findAll();
        return $this->render('main/poursuite.html.twig', [
            'controller_name' => 'MainController',
            'histoires' => $histoires,
            'id' => $id,
            'idUser' => $idUser
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
        //         $score = $_GET['score'];
        //         $idExercice = $_GET['exercice'];
        //         $repo = $manager->getRepository(Exercice::class);
        //         $Exercice = $repo->find((int) $idExercice);
        //         $idPatient = $_GET['patient'];
        //         $repo = $manager->getRepository(Patient::class);
        //         $Patient = $repo->find((int) $idPatient);
        //         $idUser = $_GET['user'];
        //         $repo = $manager->getRepository(User::class);
        //         $User = $repo->find((int) $idUser);
        //         $idBilan = $_GET['bilan'];
        //         $repo = $manager->getRepository(Bilan::class);
        //         $Bilan = $repo->find((int) $idBilan);
        //         $resultat = new Resultat();
        //         $resultat->setScore($score)
        //             ->setIdExercice($Exercice)
        //             ->setIdPatient($Patient)
        //             ->setIdUser($User)
        //             ->setIdBilan($Bilan);
        //         $resultat->setScore("1")
        //         ->setIdExercice(1)
        //         ->setIdPatient(1)
        //         ->setIdUser(1)
        //         ->setIdBilan(1);
        //         $manager->persist($resultat);
        //         $manager->flush();
        //echo (json_encode($bilan));
        // $manager->persist($resultat);
        // $manager->flush();
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
        
        echo($_GET['exercice']);
        // dd($resultat);
        
        //          $resultat = new Resultat();
        
        //          $resultat->score = '1';
        //$resultat->setName("eeeee");
        //                  ->setIdPatient(1)
        //                  ->setIdUser(1)
        //                  ->setIdBilan(1)
        //                  ->setScore("eeeee");
        //echo($resultat);
        //dd($resultat);
        $manager->persist($resultat);
        $manager->flush();
        return $this->render('main/sendarticle.html.twig');
        
    }
    /**
     *
     * @Route("/nouvellehistoire", name="HistoireCreation")
     *
     *
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