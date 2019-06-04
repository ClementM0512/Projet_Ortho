<?php

namespace App\DataFixtures;

use App\Entity\Parinaud;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ParinaudFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $parinaud = new Parinaud();
        $parinaud->setData("P1.5");
        $manager->persist($parinaud);

        for ($i=2; $i <= 6; $i++) 
        { 
            $parinaud = new Parinaud();
            $parinaud->setData("P$i");
            $manager->persist($parinaud);
        }

        $parinaud = new Parinaud();
        $parinaud->setData("P8");
        $manager->persist($parinaud);

        $parinaud = new Parinaud();
        $parinaud->setData("P10");
        $manager->persist($parinaud);

        $parinaud = new Parinaud();
        $parinaud->setData("P14");
        $manager->persist($parinaud);

        $manager->flush();
    }
}
