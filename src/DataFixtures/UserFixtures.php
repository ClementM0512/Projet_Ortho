<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Security;
use App\Entity\Permission;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('bougetesyeux@gmail.com');
        $user->setNom('administrateur');
        $user->setPrenom('administrateur');
        $user->setUsername('admin');
        $security = new Security();
        $security->setChangePass(false);
        $Password = $this->passwordEncoder->encodePassword($user, 'admin');
        $security->setPassword($Password);
        $user->setSecurity($security);
        $permission = new Permission();
        $permission->setRoles(array(
            'ROLE_SUPERADMIN',
            'ROLE_ADMIN',
            'ROLE_USER'
        ));
        $user->setPermission($permission);
       
        $manager->persist($user);

        $manager->flush();
    }
}
