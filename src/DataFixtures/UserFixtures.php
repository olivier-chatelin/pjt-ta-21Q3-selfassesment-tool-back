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
        $manager->flush();
    }
}
