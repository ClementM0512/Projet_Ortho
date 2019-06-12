<?php

namespace App\DataFixtures;

use App\Entity\Lycee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LyceeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Lycee();
        $data->setData("Général");
        $manager->persist($data);

        $data = new Lycee();
        $data->setData("Techno");
        $manager->persist($data);

        $data = new Lycee();
        $data->setData("Pro");
        $manager->persist($data);

        $manager->flush();
    }
}
