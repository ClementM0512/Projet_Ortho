<?php

namespace App\DataFixtures;

use App\Entity\Serret;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SerretFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Serret();
        $data->setData("Normale");
        $manager->persist($data);

        $data = new Serret();
        $data->setData("Anormale");
        $manager->persist($data);

        $manager->flush();
    }
}
