<?php

namespace App\DataFixtures;

use App\Entity\College;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CollegeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new College();
        $data->setData("6ème");
        $manager->persist($data);

        $data = new College();
        $data->setData("5ème");
        $manager->persist($data);

        $data = new College();
        $data->setData("4ème");
        $manager->persist($data);

        $data = new College();
        $data->setData("3ème");
        $manager->persist($data);

        $manager->flush();
    }
}
