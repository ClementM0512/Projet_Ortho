<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\ExerciceRepository;
use App\Repository\HistoireRepository;
use App\Entity\Histoire;
use App\Entity\Exercice;
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
        $exercices = $repo->findAll();        #Sert à trouver tout les objets du type passé en param
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
        $arr = array(
            $histoires[0]->getTexte(), 
            $histoires[1]->getTexte(), 
            $histoires[2]->getTexte()
        );
        echo(json_encode($arr));
        return $this->render('main/sendarticle.html.twig');
    }
}
