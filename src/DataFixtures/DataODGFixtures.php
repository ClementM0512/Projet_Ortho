<?php

namespace App\DataFixtures;

use App\Entity\DataODG;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DataODGFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $odg = new DataODG();
        $odg->setODG("");
        $manager->persist($odg);

        $odg = new DataODG();
        $odg->setODG("PL");
        $manager->persist($odg);

        for ($i=1; $i <= 8 ; $i++) { 
            $odg = new DataODG();
            $odg->setODG("$i/10");

            $manager->persist($odg);
        }     

        $odg = new DataODG();
        $odg->setODG("9/10f");
        $manager->persist($odg);

        $odg = new DataODG();
        $odg->setODG("9/10");
        $manager->persist($odg);

        $odg = new DataODG();
        $odg->setODG("10/10f");
        $manager->persist($odg);

        $odg = new DataODG();
        $odg->setODG("10/10");
        $manager->persist($odg);

        $odg = new DataODG();
        $odg->setODG("11/10");
        $manager->persist($odg);

        $manager->flush();
    }
}
