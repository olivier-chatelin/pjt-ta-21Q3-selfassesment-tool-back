<?php

namespace App\DataFixtures;

use App\Entity\Curriculum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CurriculumFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cursus = new Curriculum();
        $cursus->setName('PHP');
        $manager->persist($cursus);

        $cursus = new Curriculum();
        $cursus->setName('JS');
        $manager->persist($cursus);


        $manager->flush();
    }
}
