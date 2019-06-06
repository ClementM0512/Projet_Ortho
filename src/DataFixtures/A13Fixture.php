<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\A13;

class A13Fixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $A13=new A13();
       $A13->setAgeEquiv("<3-11")
            ->setEH("<87")
            ->setPS("<6")
            ->setCO("<6")
            ->setFG("<7")
            ->setSR("<1")
            ->setVC("<3")
            ->setVMS("<2")
            ->setFC("1");
     
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("3-11")
        ->setEH("87-88")
        ->setPS("<6")
        ->setCO("6")
        ->setFG("7")
        ->setSR("1")
        ->setVC("3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-0")
        ->setEH("89-90")
        ->setPS("6")
        ->setCO("6")
        ->setFG("7")
        ->setSR("2")
        ->setVC("3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<4-1")
        ->setEH("91")
        ->setPS("6")
        ->setCO("7")
        ->setFG("<7")
        ->setSR("3")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-2")
        ->setEH("92-94")
        ->setPS("6")
        ->setCO("7")
        ->setFG("7")
        ->setSR("4")
        ->setVC("3")
        ->setVMS("2")
        ->setFC("2");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-3")
        ->setEH("95-97")
        ->setPS("7")
        ->setCO("8")
        ->setFG("8")
        ->setSR("5")
        ->setVC("4")
        ->setVMS("2")
        ->setFC("3");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-4")
        ->setEH("98-99")
        ->setPS("7")
        ->setCO("8")
        ->setFG("8")
        ->setSR("6")
        ->setVC("4")
        ->setVMS("2")
        ->setFC("3");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-5")
        ->setEH("100-102")
        ->setPS("8")
        ->setCO("9")
        ->setFG("8")
        ->setSR("7")
        ->setVC("4")
        ->setVMS("2")
        ->setFC("3");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-6")
        ->setEH("103-105")
        ->setPS("8")
        ->setCO("9")
        ->setFG("8")
        ->setSR("8")
        ->setVC("4")
        ->setVMS("2")
        ->setFC("3");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-7")
        ->setEH("106-108")
        ->setPS("8")
        ->setCO("10")
        ->setFG("8")
        ->setSR("9")
        ->setVC("4")
        ->setVMS("2")
        ->setFC("3");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-8")
        ->setEH("109-110")
        ->setPS("9")
        ->setCO("10")
        ->setFG("8")
        ->setSR("10")
        ->setVC("5")
        ->setVMS("2")
        ->setFC("3");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<4-9")
        ->setEH("111-113")
        ->setPS("9")
        ->setCO("11")
        ->setFG("9")
        ->setSR("11")
        ->setVC("5")
        ->setVMS("3")
        ->setFC("4");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-10")
        ->setEH("114-115")
        ->setPS("10")
        ->setCO("11")
        ->setFG("9")
        ->setSR("12")
        ->setVC("5")
        ->setVMS("3")
        ->setFC("4");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("4-11")
        ->setEH("116-118")
        ->setPS("10")
        ->setCO("12")
        ->setFG("9")
        ->setSR("13")
        ->setVC("5")
        ->setVMS("3")
        ->setFC("4");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("5-0")
        ->setEH("119-120")
        ->setPS("11")
        ->setCO("12")
        ->setFG("9")
        ->setSR("14")
        ->setVC("5")
        ->setVMS("3")
        ->setFC("4");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("5-1")
        ->setEH("121-123")
        ->setPS("11")
        ->setCO("13")
        ->setFG("9")
        ->setSR("15-16")
        ->setVC("6")
        ->setVMS("3")
        ->setFC("5");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("5-2")
        ->setEH("124-125")
        ->setPS("11")
        ->setCO("13")
        ->setFG("9")
        ->setSR("17")
        ->setVC("6")
        ->setVMS("3")
        ->setFC("5");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("5-3")
        ->setEH("126-127")
        ->setPS("12")
        ->setCO("14")
        ->setFG("9")
        ->setSR("18")
        ->setVC("6")
        ->setVMS("3")
        ->setFC("5");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);
        $A13=new A13();
        $A13->setAgeEquiv("<3-11")
        ->setEH("<87")
        ->setPS("<6")
        ->setCO("<6")
        ->setFG("<7")
        ->setSR("<1")
        ->setVC("<3")
        ->setVMS("<2")
        ->setFC("1");
        
        $manager->persist($A13);

        $manager->flush();
    }
}
