<?php

namespace App\DataFixtures;

use App\Entity\Checkpoint;
use Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearResultCacheDoctrineCommand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CheckpointFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $checkpoint = new Checkpoint();
        $checkpoint->setCurriculum($this->getReference('php'));
        $checkpoint->setName('Pirates des Caraïbes');
        $checkpoint->setUpdatedAt(new \DateTime());
        $checkpoint->setCreatedAt(new \DateTime());
        $checkpoint->setDuration('4h00');
        $checkpoint->setIsVisible(true);
        $checkpoint->setNumber(3);
        $manager->persist($checkpoint);
        $this->addReference('checkpoint3', $checkpoint);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CurriculumFixtures::class,
        ];
    }
}
