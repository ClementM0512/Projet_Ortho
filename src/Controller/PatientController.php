<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PatientRepository;
use App\Repository\BilanRepository;
use App\Form\PatientType;
use App\Form\BilanType;
use App\Entity\Patient;
use App\Entity\Bilan;

class PatientController extends AbstractController
{
    /**
     * @Route("/patients", name="patients")
     */
    public function indexPatient(PatientRepository $repo)
    {
        $patient = $repo->findAll();        //Sert à trouver tout les objets du type passé en param
        
        return $this->render('patient/indexPatient.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient
        ]);
    }
    
    /**
     * @Route("/newpatient", name="patientCreate")
     * @Route("/patient/{id}/edit", name="PatientEdit")
     */
    public function _formPatient(Patient $patient = null, Request $request, ObjectManager $manager)
    {
        if (!$patient)
        {
            $patient = new Patient();
        }
        
        $form = $this->createForm(PatientType::class, $patient); //Crée un formulaire de type patient
        
        $form->handleRequest($request);             //Sert pour le traitement des données du formulaire
            
            $manager->persist($patient);            //Dit a doctrine que l'on veut save l'objet
            $manager->flush();                      //Execute la querie pour sauvegarder les données dans la table
            
            return $this->redirectToRoute('patients', ['id' => $patient->getId()]);
        }
        
        return $this->render('patient/newpatient.html.twig', [
            'formPatient' => $form->createView(),       
            'editMode' => $patient->getId() !== null    //Si on est en mode édition true/false
        ]);
    }
    
    /**
     * @Route("/bilans", name="bilans")
     */
    public function indexBilan(BilanRepository $repo)
    {
        $bilan = $repo->findAll();
        
        return $this->render('patient/indexBilan.html.twig', [
            'controller_name' => 'BilanController',
            'bilan' => $bilan
        ]);
    }
    
    /**
     * @Route("/newbilan", name="bilanCreate")
     * @Route("/bilan/{id}/edit", name="bilanEdit")
     */
    public function _formBilan(Bilan $bilan = null, Request $request, ObjectManager $manager)
    {
        if (!$bilan)
        {
            $bilan = new Bilan();
        }
        
        $form = $this->createForm(BilanType::class, $bilan); //constructeur form article
        
        $form->handleRequest($request);        
            
            $manager->persist($bilan);
            $manager->flush();
            
            return $this->redirectToRoute('bilans', ['id' => $bilan->getId()]);
        }
        
        return $this->render('patient/newbilan.html.twig', [
            'formBilan' => $form->createView(),
            'editMode' => $bilan->getId() !== null    //si on est en mode édition true/false
        ]);
    }
}
