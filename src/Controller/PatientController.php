<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\PatientRepository;
use App\Repository\BilanRepository;
use App\Form\PatientType;
use App\Form\BilanType;
use App\Entity\Patient;
use App\Entity\Bilan;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_USER")
 * 
 */
class PatientController extends AbstractController
{
    /**
     * @Route("/patients", name="patients")
     */
    public function indexPatient(PatientRepository $repo)
    {

        $patient = $repo->findAll();        #Sert à trouver tout les objets du type passé en param
        
        return $this->render('patient/indexPatient.html.twig', [
            'controller_name' => 'PatientController',
            'patients' => $patient
        ]);
    }
    
    /**
     * @Route("/newpatient", name="patientCreate")
     * @Route("/patient/{id}/edit", name="PatientEdit")
     * 
     */
    public function _formPatient(Patient $patient = null, Request $request, ObjectManager $manager)
    {
        if (!$patient)
        {
            $patient = new Patient();
        }
        
        $form = $this->createForm(PatientType::class, $patient); #Crée un formulaire de type patient
        
        $form->handleRequest($request);             #Sert pour le traitement des données du formulaire
            
        if ($form->isSubmitted() && $form->isValid()) {
                  
            $manager->persist($patient);            #Dit a doctrine que l'on veut save l'objet
            $manager->flush();                      #Execute la querie pour sauvegarder les données dans la table
            
            return $this->redirectToRoute('patients', ['id' => $patient->getId()]);
        }
        
        return $this->render('patient/newpatient.html.twig', [
            'formPatient' => $form->createView(),       
            'editMode' => $patient->getId() !== null    #Si on est en mode édition true/false
        ]);
    }
    
    /**
     * @Route("/delete/{id}/delete", name="patientDelete")
     * @IsGranted("ROLE_ADMIN")
     */
    public function deletePatient(Patient $patient, Request $request, ObjectManager $manager){
        
        $form = $this->createFormBuilder()
        ->add('Delete', SubmitType::class, ['label' => 'OUI, supprimer cet article', 'attr' => ['class' => 'Btn-delete-Article']])
        ->add('NoDelete', SubmitType::class, ['label' => 'Retour', 'attr' => ['class' => 'Btn-back-listArticles']])
        ->getForm();
        
        $form->handleRequest($request);
        
        if (($form->getClickedButton() && 'Delete' === $form->getClickedButton()->getName()))
        {
            $manager->remove($patient);        //Pour supprimer un article.
            $manager->flush();
            
            
            return $this->redirectToRoute('patients', ['id' => $patient->getId()]);
        }
        if (($form->getClickedButton() && 'NoDelete' === $form->getClickedButton()->getName()))
        {
            
            return $this->redirectToRoute('patients');
        }
        return $this->render('main/validation.html.twig', array('action' => $form->createView(),));
        
    }
    
    /**
     * @Route("/bilans", name="bilans")
     */
    public function indexBilan(BilanRepository $repo)
    {
        $bilan = $repo->findAll();
        
        return $this->render('patient/indexBilan.html.twig', [
            'controller_name' => 'BilanController',
            'bilans' => $bilan
        ]);
    }
    
    /**
     * @Route("/newbilan", name="bilanCreate")
     * @Route("/bilan/{id}/edit", name="bilanEdit")
     * @IsGranted("ROLE_ADMIN")
     */
    public function _formBilan(Bilan $bilan = null, Request $request, ObjectManager $manager)
    {
        if (!$bilan)
        {
            $bilan = new Bilan();
        }
        
        $form = $this->createForm(BilanType::class, $bilan); #constructeur form article
        
        $form->handleRequest($request);    
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $manager->persist($bilan);
            $manager->flush();
            
            return $this->redirectToRoute('bilans', ['id' => $bilan->getId()]);
        }
        return $this->render('patient/newbilan.html.twig', [
            'formBilan' => $form->createView(),
            'editMode' => $bilan->getId() !== null    #si on est en mode édition true/false
        ]);
    }
    
    /**
     * @Route("/patient/{id}", name="patient_show")
     */
    public function patientShow($id)
    {
        $repo = $this->getDoctrine()->getRepository(Patient::class);
        
        $patient = $repo->find($id);
        
        return $this->render('patient/patientShow.html.twig',[
            'patient' => $patient
        ]);
    }
        
    
    
    
}
