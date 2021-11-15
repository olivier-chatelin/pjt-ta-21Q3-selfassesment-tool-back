<?php

namespace App\DataFixtures;

use App\Entity\Checkpoint;
use App\Entity\Objective;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CheckpointFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $checkpoint1 = new Checkpoint();
        $checkpoint1->setNumber(1)
            ->setName('Al Capone')
            ->setCursus('PHP')
            ->setDuration('4h')
            ->setGlobalSkills(['css','formulaire','PDO']);
        $manager->persist($checkpoint1);
        $objective1 = new Objective();
        $objective1->setIsBonus(false)
            ->setCheckpoint($checkpoint1)
            ->setDescription('Placer le verre de Whisky à gauche')
            ->setNumber(1)
            ->addSkill($this->getReference('skill1'))
            ->addSkill($this->getReference('skill3'));
        $objective2 = new Objective();
        $objective2->setIsBonus(false)
            ->setCheckpoint($checkpoint1)
            ->setDescription('Vider le verre')
            ->setNumber(2)
            ->addSkill($this->getReference('skill2'))
            ->addSkill($this->getReference('skill1'));
        $objective5 = new Objective();
        $objective5->setIsBonus(false)
            ->setCheckpoint($checkpoint1)
            ->setDescription('Insérer les bribes')
            ->setNumber(3)
            ->addSkill($this->getReference('skill4'));
        $objective4 = new Objective();
        $objective4->setIsBonus(false)
            ->setCheckpoint($checkpoint1)
            ->setDescription('Objectif final')
            ->setNumber(4)
            ->addSkill($this->getReference('skill3'));
        $objective3 = new Objective();
        $objective3->setIsBonus(true)
            ->setCheckpoint($checkpoint1)
            ->setDescription('Objectif Bonus')
            ->setNumber(5)
            ->addSkill($this->getReference('skill4'));
        $manager->persist($objective1);
        $manager->persist($objective2);
        $manager->persist($objective5);
        $manager->persist($objective4);
        $manager->persist($objective3);
        $checkpoint2 = new Checkpoint();
        $checkpoint2->setNumber(2)
            ->setName('Cupcake')
            ->setCursus('PHP')
            ->setDuration('4h')
            ->setGlobalSkills(['css','formulaire','PDO']);
        $manager->persist($checkpoint2);
        $objective1 = new Objective();
        $objective1->setIsBonus(false)
            ->setCheckpoint($checkpoint2)
            ->setDescription('Placer le stylo à droite')
            ->setNumber(1)
            ->addSkill($this->getReference('skill1'))
            ->addSkill($this->getReference('skill3'));
        $manager->persist($objective1);
        $manager->persist($objective2);
        $objective2 = new Objective();
        $objective2->setIsBonus(false)
            ->setCheckpoint($checkpoint2)
            ->setDescription('Vider le verre de Whisky à gauche')
            ->setNumber(2)
            ->addSkill($this->getReference('skill2'))
            ->addSkill($this->getReference('skill1'));
        $manager->persist($objective1);
        $manager->persist($objective2);
        $checkpoint3 = new Checkpoint();
        $checkpoint3->setNumber(3)
            ->setName('Pirates des caraïbes')
            ->setCursus('PHP')
            ->setDuration('4h')
            ->setGlobalSkills(['css','formulaire','PDO']);
        $manager->persist($checkpoint3);
        $objective1 = new Objective();
        $objective1->setIsBonus(false)
            ->setCheckpoint($checkpoint3)
            ->setDescription('Placer le verre de Whisky à gauche')
            ->setNumber(1)
            ->addSkill($this->getReference('skill1'))
            ->addSkill($this->getReference('skill3'));
        $objective2 = new Objective();
        $objective2->setIsBonus(false)
            ->setCheckpoint($checkpoint3)
            ->setDescription('Vider le verre de Whisky à gauche')
            ->setNumber(2)
            ->addSkill($this->getReference('skill2'))
            ->addSkill($this->getReference('skill3'));
        $manager->persist($objective1);
        $manager->persist($objective2);
        $checkpoint4 = new Checkpoint();
        $checkpoint4->setNumber(4)
            ->setName('Sujet Libre Symfony')
            ->setCursus('PHP')
            ->setDuration('4h')
            ->setGlobalSkills(['css','formulaire','PDO']);
        $manager->persist($checkpoint4);
        $objective1 = new Objective();
        $objective1->setIsBonus(false)
            ->setCheckpoint($checkpoint4)
            ->setDescription('Placer le verre de Whisky à gauche')
            ->setNumber(1)
            ->addSkill($this->getReference('skill1'))
            ->addSkill($this->getReference('skill3'));
        $objective2 = new Objective();
        $objective2->setIsBonus(false)
            ->setCheckpoint($checkpoint4)
            ->setDescription('Vider le verre de Whisky à gauche')
            ->setNumber(2)
            ->addSkill($this->getReference('skill2'))
            ->addSkill($this->getReference('skill3'));
        $manager->persist($objective1);
        $manager->persist($objective2);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [SkillFixtures::class];
    }
}
