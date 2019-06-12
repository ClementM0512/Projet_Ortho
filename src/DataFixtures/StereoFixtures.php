<?php

namespace App\DataFixtures;

use App\Entity\Stereo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StereoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Stereo();
        $data->setData("1200\" chat, 600\" étoile, 550\" voiture");
        $manager->persist($data);

        $data = new Stereo();
        $data->setData("600\" éléphant, 400\" voiture, 200\" lune");
        $manager->persist($data);

        $data = new Stereo();
        $data->setData("240\", 120\", 60\", 30\"");
        $manager->persist($data);

        $manager->flush();
    }
}
