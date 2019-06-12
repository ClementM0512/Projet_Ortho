<?php

namespace App\DataFixtures;

use App\Entity\Confrontation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ConforntationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Confrontation();
        $data->setData("Par confrontation");
        $manager->persist($data);

        $data = new Confrontation();
        $data->setData("Par recherche d'amputation");
        $manager->persist($data);

        $data = new Confrontation();
        $data->setData("Goldman");
        $manager->persist($data);

        $manager->flush();
    }
}
