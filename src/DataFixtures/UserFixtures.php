<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $super = new User();
        $super->setFirstname('Super');
        $super->setLastname('Admin');
        $super->setEmail('superAdmin@gmail.com');
        $super->setPassword($this->hasher->hashPassword($super, '123456'));
        $super->setRoles(["ROLE_SUPER_ADMIN"]);
        $super->setIsVerified(true);
        $manager->persist($super);

        $olivier= new User();
        $olivier->setFirstname('Olivier');
        $olivier->setLastname('Châtelin');
        $olivier->setEmail('olivier.chatelin@gmail.com');
        $olivier->setPassword($this->hasher->hashPassword($olivier, '123456'));
        $olivier->setRoles(["ROLE_USER"]);
        $olivier->setIsVerified(true);
        $manager->persist($olivier);

        $olivier= new User();
        $olivier->setFirstname('Guillaume');
        $olivier->setLastname('Harari');
        $olivier->setEmail('guillaume.harari@wildcodeschool.com');
        $olivier->setPassword($this->hasher->hashPassword($olivier, '123456'));
        $olivier->setRoles(["ROLE_INSTRUCTOR"]);
        $olivier->setIsVerified(true);
        $manager->persist($olivier);

        $olivier= new User();
        $olivier->setFirstname('Vincent');
        $olivier->setLastname('Vaur');
        $olivier->setEmail('vincent.vaur@wildcodeschool.com');
        $olivier->setPassword($this->hasher->hashPassword($olivier, '123456'));
        $olivier->setRoles(["ROLE_INSTRUCTOR"]);
        $olivier->setIsVerified(true);
        $manager->persist($olivier);

        $olivier= new User();
        $olivier->setFirstname('Jonathan');
        $olivier->setLastname('Siaut');
        $olivier->setEmail('jonathan.siaut@wildcodeschool.com');
        $olivier->setPassword($this->hasher->hashPassword($olivier, '123456'));
        $olivier->setRoles(["ROLE_INSTRUCTOR"]);
        $olivier->setIsVerified(true);
        $manager->persist($olivier);

        $olivier= new User();
        $olivier->setFirstname('Simple');
        $olivier->setLastname('Admin');
        $olivier->setEmail('admin.admin@gmail.com');
        $olivier->setPassword($this->hasher->hashPassword($olivier, '123456'));
        $olivier->setRoles(["ROLE_ADMIN"]);
        $olivier->setIsVerified(true);
        $manager->persist($olivier);

        $manager->flush();
    }
}
