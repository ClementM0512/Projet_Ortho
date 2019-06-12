<?php

namespace App\DataFixtures;

use App\Entity\Stereoscopique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StereoscopiqueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Stereoscopique();
        $data->setData("");
        $manager->persist($data);

        $data = new Stereoscopique();
        $data->setData("LANG I");
        $manager->persist($data);
        
        $data = new Stereoscopique();
        $data->setData("LANG II");
        $manager->persist($data);

        $data = new Stereoscopique();
        $data->setData("TNO");
        $manager->persist($data);

        $manager->flush();
    }
}
