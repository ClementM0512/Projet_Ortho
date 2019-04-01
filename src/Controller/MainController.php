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
     * @Route("/exercices", name="listeExos")
     */
    public function list_exos(ExerciceRepository $repo)
    {
        $exercices = $repo->findAll();        #Sert � trouver tout les objets du type pass� en param
        //dd($exercices);
        return $this->render('main/listeExos.html.twig', [
            'controller_name' => 'MainController',
            'exercices' => $exercices
        ]);
    }
    /**
     * @Route("/exercices/chronomots", name="chronomots")
     */
    public function chronomots(HistoireRepository $repo){
        $histoires = $repo->findAll(); 
        return $this->render('main/chronomots.html.twig', [
            'controller_name' => 'MainController',
                'histoires' => $histoires
        ]);
    }
    /**
     * @Route("/sendarticle", name="sendarticle")
     */
    public function sendarticle(HistoireRepository $repo){
        
        $histoires = $repo->findAll(); 
//         $arr = array(count($histoire));
//         for ($i = 0; $i <= count($histoire); $i++) {
//             $arr[i] =  $histoires[i]->getTexte();
//         }
        $arr = array();
        $i=0;
        while($i<4){
            $arr[$i] = $histoires[$i]->getTexte();
            $i++;
        }
//         $arr = array(
//              $histoires[0]->getTexte(), 
//              $histoires[1]->getTexte(), 
//              $histoires[2]->getTexte(),
//              $histoires[3]->getTexte()
//          );
        echo(json_encode($arr));
        return $this->render('main/sendarticle.html.twig');
    }
    /**
     * @Route("/nouvellehistoire", name="HistoireCreation")
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


