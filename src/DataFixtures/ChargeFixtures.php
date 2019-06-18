<?php

namespace App\DataFixtures;

use App\Entity\Charge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ChargeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Charge();
        $data->setData("");
        $manager->persist($data);

        $data = new Charge();
        $data->setData("orthophonie");
        $manager->persist($data);

        $data = new Charge();
        $data->setData("psychomotricité");
        $manager->persist($data);

        $data = new Charge();
        $data->setData("psychologie");
        $manager->persist($data);

        $data = new Charge();
        $data->setData("ergothérapie");
        $manager->persist($data);

        $data = new Charge();
        $data->setData("kinésithérapeute");
        $manager->persist($data);

        $manager->flush();
    }
}
