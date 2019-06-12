<?php

namespace App\DataFixtures;

use App\Entity\Textmotifs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TextmotifsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new Textmotifs();
        $data->setData("");
        $manager->persist($data);

        $data = new Textmotifs();
        $data->setData("Sur demmande de l\'ophtalmologiste, de l\'ORL, du neurologue.");
        $manager->persist($data);

        $data = new Textmotifs();
        $data->setData("En rapport à des troubles du neuro-développement, TSA, DYS.");
        $manager->persist($data);

        $data = new Textmotifs();
        $data->setData("En rapport à des difficultés dans l\'apprentissages et à l\'école, attention, concentration, lecture, retranscription.");
        $manager->persist($data);

        $data = new Textmotifs();
        $data->setData("Par rapport à des signe fonctionnels : céphalées, vision double, vision trouble, clignement, position vicieuse de la tête, larmoiement.");
        $manager->persist($data);

        $manager->flush();
    }
}
