<?php

namespace App\DataFixtures;

use App\Entity\Couleurs2;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Couleurs2Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Couleurs2();
        $data->setData("Normale");
        $manager->persist($data);

        $data = new Couleurs2();
        $data->setData("Anormale");
        $manager->persist($data);

        $manager->flush();
    }
}
