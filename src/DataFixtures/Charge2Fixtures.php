<?php

namespace App\DataFixtures;

use App\Entity\Charge2;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Charge2Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Charge2();
        $data->setData("");
        $manager->persist($data);

        $data = new Charge2();
        $data->setData("SESSAD");
        $manager->persist($data);

        $data = new Charge2();
        $data->setData("IME");
        $manager->persist($data);

        $data = new Charge2();
        $data->setData("CMP");
        $manager->persist($data);

        $manager->flush();
    }
}
