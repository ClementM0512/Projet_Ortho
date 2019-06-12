<?php

namespace App\DataFixtures;

use App\Entity\Accomodation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AccomodationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Accomodation();
        $data->setData("Elevé (supérieur à 5)");
        $manager->persist($data);

        $data = new Accomodation();
        $data->setData("Normal (3 à 5)");
        $manager->persist($data);

        $data = new Accomodation();
        $data->setData("Bas (inferieur à 3)");
        $manager->persist($data);

        $manager->flush();
    }
}
