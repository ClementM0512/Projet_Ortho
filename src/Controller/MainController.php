<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    { if (false === $authChecker->isGranted('ROLE_USER')) {
        return $this->redirectToRoute('security_login');
    }
        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    
    /**
     * @Route("/exercices", name="listeExos")
     */
    public function list_exos()
    {
        if (false === $authChecker->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('security_login');
        }
        return $this->render('main/listeExos.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/exercices/chronomots", name="chronomots")
     */
    public function chronomots()
    {
        if (false === $authChecker->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('security_login');
        }
        return $this->render('main/chronomots.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
