<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $skill = new Skill();
        $skill->setName('Formulaire');
        $skill->setColor('#DC143C');
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setName('Symfony');
        $skill->setColor('#C71585');
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setName('Skill Test 1');
        $skill->setColor('#F76C6C');
        $manager->persist($skill);

        $manager->flush();
    }
}
