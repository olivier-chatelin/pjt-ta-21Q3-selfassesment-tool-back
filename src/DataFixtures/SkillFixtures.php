<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $skill1 = new Skill();
        $skill1->setName('CSS');
        $manager->persist($skill1);
        $this->addReference('skill1',$skill1);
        $skill2= new Skill();
        $skill2->setName('PDO');
        $manager->persist($skill2);
        $this->addReference('skill2',$skill2);
        $skill3 = new Skill();
        $skill3->setName('POO');
        $manager->persist($skill3);
        $this->addReference('skill3',$skill3);
        $skill4 = new Skill();
        $skill4->setName('FORMULAIRE');
        $manager->persist($skill4);
        $this->addReference('skill4',$skill4);

        $manager->flush();
    }
}
