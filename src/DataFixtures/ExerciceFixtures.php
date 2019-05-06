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
                 ->setDateCreation($faker->dateTime);
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('lestraits')
            ->setImage('image/lestraits.png')
            ->setLien('lestraits')
            ->setDateCreation($faker->dateTime);
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('duction')
            ->setImage('image/duction.png')
            ->setLien('duction')
            ->setDateCreation($faker->dateTime);
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('lancaster')
            ->setImage('image/lancaster.png')
            ->setLien('lancaster')
            ->setDateCreation($faker->dateTime);
        $manager->persist($exercice);
        
        $exercice = new Exercice();
        $exercice->setName('cartememoire')
        ->setImage('image/cartememoire.png')
        ->setLien('cartememoire')
        ->setDateCreation($faker->dateTime);
        $manager->persist($exercice);
        
        $manager->flush();
    }
}
