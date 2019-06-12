<?php

namespace App\DataFixtures;

use App\Entity\Echelle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EchelleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Echelle();
        $data->setData("Parinaud");
        $manager->persist($data);

        $data = new Echelle();
        $data->setData("Rosano");
        $manager->persist($data);

        $manager->flush();
    }
}
