<?php

namespace App\DataFixtures;

use App\Entity\Affichages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AffichagesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Affichages();
        $data->setData("Angulaire");
        $manager->persist($data);

        $data = new Affichages();
        $data->setData("Linéaire");
        $manager->persist($data);

        $manager->flush();
    }
}
