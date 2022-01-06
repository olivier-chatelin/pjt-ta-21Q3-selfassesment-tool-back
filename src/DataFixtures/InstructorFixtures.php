<?php

namespace App\DataFixtures;

use App\Entity\Instructor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InstructorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $instructor = new Instructor();
        $instructor->setFirstname('Guillaume');
        $instructor->setLastname('Harari');
        $instructor->setEmail('guillaume.harari@wildcodeschool.com');
        $instructor->setCurriculum($this->getReference('php'));
        $manager->persist($instructor);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [CurriculumFixtures::class];
    }

}
