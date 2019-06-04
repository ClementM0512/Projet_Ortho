<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\PatientRepository;
use App\Repository\BilanRepository;
use App\Form\PatientType;
use App\Form\BilanType;
use App\Entity\Patient;
use App\Entity\Bilan;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\Extension\Core\Type\SearchType;


/**
 * @IsGranted("ROLE_USER")
 * 
 */
class PatientController extends AbstractController
{    
    ///////////////////////////////////////////////////////////////////////////////////////
    //------------------------------------- PATIENT -------------------------------------//
    ///////////////////////////////////////////////////////////////////////////////////////
    
    // Affichage de tout les patient dans la BD et sert à la recherche des patients
    /**
     * @Route("/patients", name="patients")
     */
    public function indexPatient(PatientRepository $repo, Request $request)
    {

        $patient = $repo->loadByAlphaOrder();        #Sert à trouver tout les objets du type passé en param
        
        $form = $this->createFormBuilder()
        ->add('Recherche', SearchType::class, ['required'=> false])
        ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $resultat =$form->getData()['Recherche'];
            if (!$resultat) {
                return $this->render('patient/indexPatient.html.twig', [                                #creation de la vue
                    'patients'    => $patient,                                                       #on passe tout les utilisateur pour la gestion
                    'form' => $form->createView(),
                    'rechercheResultat' => null,
                ]);
            }
            
            $resultat = $form->getData()['Recherche'];
            $rechercheResultatsNom = $repo->loadByElementBegin('nom', $resultat);                      #Les trois lignes sont des requêtes personnalisées
            $rechercheResultatsPrenom = $repo->loadByElementBegin('prenom', $resultat);                #Elles récupèrent tout les champs commencant par            $rechercheResultats = [];
            $testPositif = 0;
            $rechercheResultats = [];
            
            foreach($rechercheResultatsNom as $recherche)
            {
                $rechercheResultats[] = $recherche;
            }
            foreach($rechercheResultatsPrenom as $recherche)
            {
                foreach($rechercheResultats as $compareId)
                {
                    if($recherche->getId() == $compareId->getId())
                    {
                        $testPositif = 1;
                    }
                }
                $testPositif ? $testPositif =0 : $rechercheResultats[] = $recherche;
                
            }          
            
            if (!$rechercheResultats) {
                $this->addFlash('danger', 'pas de resultat, incomplet ou innexistant');
                return $this->render('patient/indexPatient.html.twig', [
                    'patients'    => null,
                    'form' => $form->createView(),
                    'rechercheResultat' => $rechercheResultats,
                ]);
            }
            return $this->render('patient/indexPatient.html.twig', [
                'patients'    => null,
                'form' => $form->createView(),
                'rechercheResultat' => $rechercheResultats,
            ]);
        }       
        return $this->render('patient/indexPatient.html.twig', [
            'patients' => $patient,
            'form' => $form->createView(),
            'rechercheResultat' => null,
        ]);
    }
    
    //Formulaire de création et édition du patient
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
            $patient->setCharge($form->get('charge')->getData().'/'.$form->get('precision')->getData());
     
            $manager->persist($patient);            #Dit a doctrine que l'on veut save l'objet
            $manager->flush();                      #Execute la querie pour sauvegarder les données dans la table
            
            return $this->redirectToRoute('patients', ['id' => $patient->getId()]);
        }
        
        return $this->render('patient/newpatient.html.twig', [
            'formPatient' => $form->createView(),       
            'editMode' => $patient->getId() !== null    #Si on est en mode édition true/false
        ]);
    }
    
    //Suppression du patient sélectionné
    /**
     * @Route("/patient/{id}/delete", name="patientDelete")
     * @IsGranted("ROLE_ADMIN")
     */
    public function deletePatient(Patient $patient, Request $request, ObjectManager $manager){
        
        $form = $this->createFormBuilder()
        ->add('Delete', SubmitType::class, ['label' => 'OUI, supprimer ce patient', 'attr' => ['class' => 'btn btn-danger btn-confirm']])
        ->add('NoDelete', SubmitType::class, ['label' => 'Retour', 'attr' => ['class' => 'btn btn-primary btn-confirm']])
        ->getForm();
        
        $form->handleRequest($request);
        
        if (($form->getClickedButton() && 'Delete' === $form->getClickedButton()->getName()))
        {
            $repo = $this->getDoctrine()->getRepository(Bilan::class);
            $bilans = $repo->findBy(['patient' => $patient->getId()]);

            foreach ($bilans as $bilan) {
                $manager->remove($bilan);
                $manager->flush();
            }

            $manager->remove($patient);        //Pour supprimer un article.
            $manager->flush();
            
            
            return $this->redirectToRoute('patients', ['id' => $patient->getId()]);
        }
        if (($form->getClickedButton() && 'NoDelete' === $form->getClickedButton()->getName()))
        {
            
            return $this->redirectToRoute('patients');
        }
        return $this->render('main/validation.html.twig', array('action' => $form->createView(), 'patient' => $patient));
        
    }
    
    //Affichage du patient en détail
    /**
     * @Route("/patient/{id}", name="patient_show")
     */
    public function patientShow($id)
    {
        $repo = $this->getDoctrine()->getRepository(Patient::class);
        
        
        $patient = $repo->find($id);
       
       $charge = explode("/", $patient->getCharge());
    
        
        return $this->render('patient/patientShow.html.twig',[
            'patient' => $patient,
            'charge' => $charge
        ]);
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////
    //-------------------------------------- BILAN --------------------------------------//
    ///////////////////////////////////////////////////////////////////////////////////////
    
    //Affichage de tout les bilans du patient sélectionné
    /**
     * @Route("/{id}/bilansPatient", name="bilansPatient")
     */
    public function showBilans(Patient $patient)
    {
        $repo = $this->getDoctrine()->getRepository(Bilan::class);
        
        $bilan = $repo->findBy(
            ['patient' => $patient->getId()]);
        
        return $this->render('patient/showBilans.html.twig', [
            'controller_name' => 'BilanController',
            'bilans' => $bilan,
            'patient' => $patient
        ]);
    }
    
    //Formulaire pour la création d'un nouveau bilan
    /**
     * @Route("/{id}/bilan/newbilan", name="bilanCreate")
     * @IsGranted("ROLE_ADMIN")
     */
    public function _formCreateBilan(Patient $patient, Request $request, ObjectManager $manager)
    {

        $bilan = new Bilan();
        
        $bilan->setPatient($patient);
        
        $form = $this->createForm(BilanType::class, $bilan); #constructeur form article
        
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $manager->persist($bilan);
            $manager->flush();
            
            return $this->redirectToRoute('bilansPatient', ['id' => $patient->getId()]);
        }
        return $this->render('patient/newBilan.html.twig', [
            'formBilan' => $form->createView(),
            'editMode' => $bilan->getId() !== null    #si on est en mode édition true/false
        ]);
    }
    
    //Affichage d'un bilan en détail
    /**
     * @Route("/{idP}/bilan/{idB}", name="bilan_show")
     */
    public function bilanShow($idP, $idB)
    {

        $repo = $this->getDoctrine()->getRepository(Bilan::class);      
        $bilan = $repo->find($idB);
        
        $repo = $this->getDoctrine()->getRepository(Patient::class);
        $patient = $repo->find($idP);
        
        return $this->render('patient/bilanShow.html.twig',[
            'bilan' => $bilan,
            'patient' => $patient
        ]);
    }   
   
    //Formulaire pour l'édition d'un bilan
    /**
     * @Route("/{idP}/bilan/{idB}/edit", name="bilanEdit")
     * @IsGranted("ROLE_ADMIN")
     */
    public function _formEditBilan($idP, $idB, Request $request, ObjectManager $manager)
    {
        $repo = $this->getDoctrine()->getRepository(Bilan::class);
        $bilan = $repo->find($idB);
        
        $repo = $this->getDoctrine()->getRepository(Patient::class);
        $patient = $repo->find($idP);
        
        $form = $this->createForm(BilanType::class, $bilan); #constructeur form article
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $manager->persist($bilan);
            $manager->flush();
            
            return $this->redirectToRoute('bilansPatient', ['id' => $patient->getId()]);
        }
        return $this->render('patient/newbilan.html.twig', [
            'formBilan' => $form->createView(),
            'editMode' => $bilan->getId() !== null    #si on est en mode édition true/false
        ]);
    }
    
    //Suppression d'un bilan
    /**
     * @Route("/{idP}/bilan/{idB}/delete", name="bilanDelete")
     * @IsGranted("ROLE_ADMIN")
     */
    public function deleteBilan($idP, $idB, Request $request, ObjectManager $manager){
        
        $form = $this->createFormBuilder()
        ->add('Delete', SubmitType::class, ['label' => 'OUI, supprimer ce bilan', 'attr' => ['class' => 'btn btn-danger btn-confirm']])
        ->add('NoDelete', SubmitType::class, ['label' => 'Retour', 'attr' => ['class' => 'btn btn-primary btn-confirm']])
        ->getForm();
        
        $repo = $this->getDoctrine()->getRepository(Bilan::class);
        $bilan = $repo->find($idB);
        
        $repo = $this->getDoctrine()->getRepository(Patient::class);
        $patient = $repo->find($idP);
        
        $form->handleRequest($request);
        
        if (($form->getClickedButton() && 'Delete' === $form->getClickedButton()->getName()))
        {
            $manager->remove($bilan);        //Pour supprimer un article.
            $manager->flush();
            
            
            return $this->redirectToRoute('bilansPatient', ['id' => $patient->getId()]);
        }
        if (($form->getClickedButton() && 'NoDelete' === $form->getClickedButton()->getName()))
        {
            
            return $this->redirectToRoute('bilansPatient', ['id' => $patient->getId()]);
        }
        return $this->render('main/validation.html.twig', array('action' => $form->createView(),));
        
    }    
        
    
}
