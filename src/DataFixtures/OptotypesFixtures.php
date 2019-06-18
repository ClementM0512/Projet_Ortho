<?php

namespace App\DataFixtures;

use App\Entity\Optotypes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OptotypesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Optotypes();
        $data->setData("");
        $manager->persist($data);

        $data = new Optotypes();
        $data->setData("Lettres");
        $manager->persist($data);
        
        $data = new Optotypes();
        $data->setData("E");
        $manager->persist($data);

        $data = new Optotypes();
        $data->setData("Dessins");
        $manager->persist($data);

        $manager->flush();
    }
}
