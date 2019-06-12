<?php

namespace App\DataFixtures;

use App\Entity\Couleurs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CouleursFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Couleurs();
        $data->setData("BabyDalton");
        $manager->persist($data);

        $data = new Couleurs();
        $data->setData("Ishihara");
        $manager->persist($data);

        $manager->flush();
    }
}
