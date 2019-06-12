<?php

namespace App\DataFixtures;

use App\Entity\Distance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DistanceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Distance();
        $data->setData("");
        $manager->persist($data);

        $data = new Distance();
        $data->setData("3m");
        $manager->persist($data);

        $data = new Distance();
        $data->setData("3.5m");
        $manager->persist($data);

        $data = new Distance();
        $data->setData("4m");
        $manager->persist($data);

        $data = new Distance();
        $data->setData("4.5m");
        $manager->persist($data);

        $data = new Distance();
        $data->setData("5m");
        $manager->persist($data);

        $manager->flush();
    }
}
