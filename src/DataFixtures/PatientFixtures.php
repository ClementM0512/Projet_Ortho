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
            $patient->setNom($faker->firstName)
                    ->setPrenom($faker->lastName)
                    ->setDateDeNaissance($faker->dateTime)
                    ->setAdresse($faker->address);
            
            
            $manager->persist($patient);
        }
        $manager->flush();
    }
}
