<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ExerciceRepository;
use App\Entity\Exercice;


class MainController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
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
    public function chronomots()
    {
        return $this->render('main/chronomots.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
