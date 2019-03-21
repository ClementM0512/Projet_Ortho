<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        for ($i = 0; $i < 5; $i ++) {
            $user = new User();
            $user->setUsername($faker->userName)
                ->setEmail($faker->email)
                ->setChangePass(false)
                ->setRoles(['ROLE_USER']);
            
            $user->setPassword($this->passwordEncoder->encodePassword($user, '12345678'));
            
            $manager->persist($user);
        }
        for ($i = 0; $i < 5; $i ++) {
            $user = new User();
            $user->setUsername($faker->userName)
            ->setEmail($faker->email)
            ->setChangePass(false)
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
            
            $user->setPassword($this->passwordEncoder->encodePassword($user, '12345678'));
            
            $manager->persist($user);
        }
        for ($i = 0; $i < 5; $i ++) {
            $user = new User();
            $user->setUsername($faker->userName)
            ->setEmail($faker->email)
            ->setChangePass(false)
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN','ROLE_SUPERADMIN']);
            
            $user->setPassword($this->passwordEncoder->encodePassword($user, '12345678'));
            
            $manager->persist($user);
        }
        
        $manager->flush();
    }
}
