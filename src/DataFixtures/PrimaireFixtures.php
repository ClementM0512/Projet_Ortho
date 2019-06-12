<?php

namespace App\DataFixtures;

use App\Entity\Primaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PrimaireFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Primaire();
        $data->setData("PS");
        $manager->persist($data);

        $data = new Primaire();
        $data->setData("MS");
        $manager->persist($data);

        $data = new Primaire();
        $data->setData("GS");
        $manager->persist($data);

        $data = new Primaire();
        $data->setData("CP");
        $manager->persist($data);

        $data = new Primaire();
        $data->setData("CE1");
        $manager->persist($data);

        $data = new Primaire();
        $data->setData("CE2");
        $manager->persist($data);

        $data = new Primaire();
        $data->setData("CM1");
        $manager->persist($data);

        $data = new Primaire();
        $data->setData("CM2");
        $manager->persist($data);

        $manager->flush();
    }
}
