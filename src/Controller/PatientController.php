<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PatientRepository;
use App\Form\PatientType;
use App\Entity\Patient;
use App\Entity\Bilan;

class PatientController extends AbstractController
{
    /**
     * @Route("/patients", name="patients")
     */
    public function index(PatientRepository $repo)
    {
        $patient = $repo->findAll();
        
        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient
        ]);
    }
    
    /**
     * @Route("/newpatient", name="patientCreate")
     * @Route("/patient/{id}/edit", name="PatientEdit")
     */
    public function _form(Patient $patient = null, Request $request, ObjectManager $manager)
    {
        if (!$patient)
        {
            $patient = new Patient();
        }
        
        $form = $this->createForm(PatientType::class, $patient); //constructeur form article
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
//             if (!$patient->getId()){
//                 $patient->setCreateAt(new \DateTime());
//             }
            
            $manager->persist($patient);
            $manager->flush();
            
            return $this->redirectToRoute('patients', ['id' => $patient->getId()]);
        }
        
        return $this->render('patient/newpatient.html.twig', [
            'formPatient' => $form->createView(),
            'editMode' => $patient->getId() !== null    //si on est en mode édition true/false
        ]);
    }
}
