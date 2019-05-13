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
                 ->setDescription("d");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('lestraits')
            ->setImage('image/lestraits.png')
            ->setLien('lestraits')
            ->setDateCreation($faker->dateTime)
            ->setDescription("d");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('duction')
            ->setImage('image/duction.png')
            ->setLien('duction')
            ->setDateCreation($faker->dateTime)
            ->setDescription("d");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('lancaster')
            ->setImage('image/lancaster.png')
            ->setLien('lancaster')
            ->setDateCreation($faker->dateTime)
            ->setDescription("d");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('cartememoire')
        ->setImage('image/cartememoire.png')
        ->setLien('cartememoire')
        ->setDateCreation($faker->dateTime)
        ->setDescription("d");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('poursuite')
        ->setImage('image/poursuite.png')
        ->setLien('poursuite')
        ->setDateCreation($faker->dateTime)
        ->setDescription("d");
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('Mots-Outil')
        ->setImage('image/motsoutil.png')
        ->setLien('motsoutil')
        ->setDateCreation($faker->dateTime)
        ->setDescription("d");
        $manager->persist($exercice);
        $manager->flush();
    }
}
