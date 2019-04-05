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
use App\Entity\Resultat;
use App\Entity\Patient;
use App\Entity\Histoire;
use App\Entity\Exercice;
use App\Form\HistoireType;
/*
 * @IsGranted("ROLE_USER")
 */
class MainController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(){
        
        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    
    /**
     * @Route("/Patient/{id}/exercices", name="listeExos")
     * @Route("/exercices", name="listeExos")
     */
    public function list_exos(Patient $patient = null, ExerciceRepository $repo)
    {
        if($patient)
        {
            $id = $patient->getId();
        }
        else
        {
            $id = 0;
        }
        //dd($patient->getId());
        $exercices = $repo->findAll();        #Sert � trouver tout les objets du type pass� en param
        //dd($exercices);
        return $this->render('main/listeExos.html.twig', [
            'controller_name' => 'MainController',
            'exercices' => $exercices,
            'id' => $id
        ]);
    }
    /**
     * @Route("/exercices/chronomots", name="chronomots")
     * @Route("/Patient/{id}/exercices/chronomots", name="chronomotsAP")
     */
    public function chronomots(Patient $patient = null, HistoireRepository $repo){
        if($patient)
        {
            $id = $patient->getId();
        }
        else
        {
            $id = 0;
        }
        $histoires = $repo->findAll(); 
        return $this->render('main/chronomots.html.twig', [
            'controller_name' => 'MainController',
                'histoires' => $histoires,
            'id'=>$id
        ]);
    }
    
    /**
     * @Route("/exercices/lancaster", name="lancaster")
     * @Route("/Patient/{id}/exercices/lancaster", name="lancasterAP")
     */
    public function lancaster(Patient $patient = null){
        if($patient)
        {
            $id = $patient->getId();
        }
        else
        {
            $id = 0;
        }
        return $this->render('main/lancaster.html.twig', [
            'controller_name' => 'MainController',
            'id'=>$id
        ]);
    }
    
    /**
     * @Route("/exercices/duction", name="duction")
     * @Route("/Patient/{id}/exercices/duction", name="ductionAP")
     */
    public function duction(Patient $patient = null){
        if($patient)
        {
            $id = $patient->getId();
        }
        else
        {
            $id = 0;
        }
        return $this->render('main/duction.html.twig', [
            'controller_name' => 'MainController',
            'id'=>$id
        ]);
    }
    
    /**
     * @Route("/receptionajax", name="receptionajax")
     */
    public function receptionajax(HistoireRepository $repo){
        
        $histoires = $repo->findAll(); 
          for ($i = 0; $i < count($histoires);$i++) {
              $arr[$i] =  $histoires[$i]->getTexte();
          }
        echo(json_encode($arr));
        return $this->render('main/sendarticle.html.twig');
    }
    /**
     * @Route("/envoiajax", name="envoiajax")
     */
    public function envoieAjax(ObjectManager $manager){
        $score = $_GET['score'];
        $exercice = int($_GET['exercice']);
        $patient = int($_GET['patient']);
        $user = int($_GET['user']);
        $bilan = int($_GET['bilan']);   
        $resultat = new Resultat();
        $resultat->setScore("excellent")
                 ->setIdExercice(1)
                 ->setIdPatient(1)
                 ->setIdUser(1)
                 ->setIdBilan(1);
       
        
        echo(json_encode($resultat));
//         $manager->persist($resultat);
//         $manager->flush();
        
        return $this->render('main/sendarticle.html.twig');
    }
    /**
     * @Route("/nouvellehistoire", name="HistoireCreation")
     * 
     *
     */
    public function createHistoire(Request $request, ObjectManager $manager){
        
        $histoire = new Histoire();
        $form = $this->createFormBuilder($histoire)
                     ->add('name')
                     ->add('texte')
                     ->add('save', SubmitType::class)
                     ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($histoire);
            $manager->flush();
            
            return $this->redirectToRoute('listeExos');
        }
        return $this->render('main/nouvellehistoire.html.twig', [
            'formHistoire' => $form->createView()
        ]);
                     
     
        
    }
}


