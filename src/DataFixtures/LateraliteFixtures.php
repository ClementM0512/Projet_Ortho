<?php

namespace App\DataFixtures;

use App\Entity\Lateralite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LateraliteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Lateralite();
        $data->setData("");
        $manager->persist($data);

        $data = new Lateralite();
        $data->setData("Droitier");
        $manager->persist($data);

        $data = new Lateralite();
        $data->setData("Gaucher");
        $manager->persist($data);

        $data = new Lateralite();
        $data->setData("Non-defini");
        $manager->persist($data);

        $manager->flush();
    }
}
