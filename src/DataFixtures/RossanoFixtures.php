<?php

namespace App\DataFixtures;

use App\Entity\Rossano;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RossanoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rossano = new Rossano();
        $rossano->setData("R1/2");
        $manager->persist($rossano);

        $rossano = new Rossano();
        $rossano->setData("R1/2.5");
        $manager->persist($rossano);

        for ($i=3; $i <= 6 ; $i++) { 
            $rossano = new Rossano();
            $rossano->setData("R1/$i");
            $manager->persist($rossano);
        }

        $rossano = new Rossano();
        $rossano->setData("R1/8");
        $manager->persist($rossano);
        
        $rossano = new Rossano();
        $rossano->setData("R1/10");
        $manager->persist($rossano);

        $rossano = new Rossano();
        $rossano->setData("R1/12");
        $manager->persist($rossano);

        $rossano = new Rossano();
        $rossano->setData("R1/16");
        $manager->persist($rossano);

        $rossano = new Rossano();
        $rossano->setData("R1/20");
        $manager->persist($rossano);


        $manager->flush();
    }
}
