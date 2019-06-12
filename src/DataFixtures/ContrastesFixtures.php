<?php

namespace App\DataFixtures;

use App\Entity\Contrastes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContrastesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Contrastes();
        $data->setData("100%");
        $manager->persist($data);

        $data = new Contrastes();
        $data->setData("75%");
        $manager->persist($data);

        $data = new Contrastes();
        $data->setData("50%");
        $manager->persist($data);
        
        $data = new Contrastes();
        $data->setData("25%");
        $manager->persist($data);

        $data = new Contrastes();
        $data->setData("10%");
        $manager->persist($data);

        $data = new Contrastes();
        $data->setData("8%");
        $manager->persist($data);

        $data = new Contrastes();
        $data->setData("6%");
        $manager->persist($data);

        $data = new Contrastes();
        $data->setData("5%");
        $manager->persist($data);

        $data = new Contrastes();
        $data->setData("4%");
        $manager->persist($data);

        $data = new Contrastes();
        $data->setData("2%");
        $manager->persist($data);

        $manager->flush();
    }
}
