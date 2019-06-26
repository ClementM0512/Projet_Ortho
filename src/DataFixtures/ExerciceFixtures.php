<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Exercice;
use Faker\Factory;

class ExerciceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        $faker = Factory::create('fr_FR');
        
        $exercice = new Exercice();
        $exercice->setName('Chronomots')
                 ->setImage('image/chronomots.png')
                 ->setLien('chronomots')
                 ->setDateCreation($faker->dateTime)
                 ->setDescription("Calcul le débit de mots lu par secondes");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('Tracer droit')
            ->setImage('image/lestraits.png')
            ->setLien('lestraits')
            ->setDateCreation($faker->dateTime)
            ->setDescription("Tracer un trait sans dépasser les limites");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('Duction')
            ->setImage('image/duction.png')
            ->setLien('duction')
            ->setDateCreation($faker->dateTime)
            ->setDescription("Permet à l'orthoptiste de prendre des notes à propos du handicape du patient");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('Lancaster')
            ->setImage('image/lancaster.png')
            ->setLien('lancaster')
            ->setDateCreation($faker->dateTime)
            ->setDescription("Permet de reporter les points vu par le patient lors du test de Lancaster");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('Cartememoire')
        ->setImage('image/cartememoire.png')
        ->setLien('cartememoire')
        ->setDateCreation($faker->dateTime)
        ->setDescription("Demande au patient d'associer les paires de mêmes cartes");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('Poursuite')
        ->setImage('image/poursuite.png')
        ->setLien('poursuite')
        ->setDateCreation($faker->dateTime)
        ->setDescription("Fait défiler un texte à une vitesse pré-définie");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('Mots-Outil')
        ->setImage('image/motsoutil.png')
        ->setLien('motsoutil')
        ->setDateCreation($faker->dateTime)
        ->setDescription("Demande au patient de completer un texte à trou");
        $manager->persist($exercice);
        $manager->flush();
    }
}
