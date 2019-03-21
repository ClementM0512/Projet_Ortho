<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Patient;

class PatientFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        for ($i = 0; $i < 20; $i ++) 
        {
            $patient = new Patient();
            $patient->setNom('jean')
                    ->setPrenom('michel')
                    ->setBirthdate($faker->dateTime);
            
            
            $manager->persist($patient);
        }
        $manager->flush();
    }
}
