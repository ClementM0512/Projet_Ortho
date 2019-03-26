<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
    public function list_exos(){
        
        return $this->render('main/listeExos.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/exercices/chronomots", name="chronomots")
     */
    public function chronomots(){
        
        return $this->render('main/chronomots.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
