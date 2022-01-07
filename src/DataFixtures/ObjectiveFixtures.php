<?php

namespace App\DataFixtures;

use App\Entity\Objective;
use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ObjectiveFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $objective1 = new Objective();
        $objective1 ->setCreatedAt(new \DateTime())
                    ->setUpdatedAt(new \DateTime())
                    ->setCheckpoint($this->getReference('checkpoint3'))
                    ->setNumber(1)
                    ->setDescription('J\'ai réussi à cloner le projet')
                    ->setIsBonus(false);
        $git = new Skill();
        $git->setName('Git')
            ->setColor('#E7FBBE')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective1);

        $manager->persist($git);
        $manager->persist($objective1);

        $objective2 = new Objective();
        $objective2 ->setCreatedAt(new \DateTime())
                    ->setUpdatedAt(new \DateTime())
                    ->setCheckpoint($this->getReference('checkpoint3'))
                    ->setNumber(2)
                    ->setDescription('J\'ai réussi à remplir ma base de données')
                    ->setIsBonus(false);
        $command = new Skill();
        $command->setName('Commandes Symfony')
            ->setColor('#D9D7F1')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective2);

        $init = new Skill();
        $init->setName('initialisation projet Symfony')
            ->setColor('#D5ECC2')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective2);

        $manager->persist($command);
        $manager->persist($init);
        $manager->persist($objective2);

        $objective3 = new Objective();
        $objective3 ->setCreatedAt(new \DateTime())
                    ->setUpdatedAt(new \DateTime())
                    ->setCheckpoint($this->getReference('checkpoint3'))
                    ->setNumber(3)
                    ->setDescription('J\'ai réussi à téléporter mon bateau')
                    ->setIsBonus(false);


        $urlManipulation = new Skill();
        $urlManipulation->setName('Manipulation URL ')
            ->setColor('#FFC4E1')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective3);


        $manager->persist($urlManipulation);

        $manager->persist($objective3);

        $objective4 = new Objective();
        $objective4 ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCheckpoint($this->getReference('checkpoint3'))
            ->setNumber(4)
            ->setDescription('J\'ai réussi à faire bouger mon bateau de case en case')
            ->setIsBonus(false);

        $validRoute = new Skill();
        $validRoute->setName('Manipulation de Routes ')
            ->setColor('#92A9BD')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective3);

        $dbManipulation = new Skill();
        $dbManipulation->setName('Manipulation Base de données ')
            ->setColor('#EEC373')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective4);

        $twig = new Skill();
        $twig->setName('Données dynamiques Twig')
            ->setColor('#94DAFF')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective4);

        $conditions = new Skill();
        $conditions->setName('Conditions')
            ->setColor('#96C7C1')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective4);

        $manager->persist($validRoute);
        $manager->persist($dbManipulation);
        $manager->persist($conditions);
        $manager->persist($validRoute);
        $manager->persist($objective4);


        $objective5 = new Objective();
        $objective5 ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCheckpoint($this->getReference('checkpoint3'))
            ->setNumber(5)
            ->setDescription('J\'ai réussi à vérifier si le bateau de sort du cadre')
            ->setIsBonus(false)
            ->addSkill($conditions);

        $service = new Skill();
        $service->setName('Manipulation de service')
            ->setColor('#FCFFA6')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective5);

        $injection = new Skill();
        $injection->setName('Injection de dépendances ')
            ->setColor('#D57E7E')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective5);

        $manager->persist($service);
        $manager->persist($injection);
        $manager->persist($objective5);

        $objective5= new Objective();
        $objective5 ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCheckpoint($this->getReference('checkpoint3'))
            ->setNumber(5)
            ->setDescription('J\'ai réussi à afficher un message erreur en cas de sortie de cadre')
            ->setIsBonus(false)
            ->addSkill($service);

        $flash = new Skill();
        $flash->setName('affichage erreurs ')
            ->setColor('#DE8971')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective5);

        $manager->persist($objective5);
        $manager->persist($flash);

        $objective6= new Objective();
        $objective6 ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCheckpoint($this->getReference('checkpoint3'))
            ->setNumber(6)
            ->setDescription('J\'ai réussi à afficher les coordonnées du bateau ainsi que le type du lieu')
            ->setIsBonus(false)
            ->addSkill($dbManipulation)
            ->addSkill($twig)
            ->addSkill($command);

        $entity = new Skill();
        $entity->setName('Création entité')
            ->setColor('#E4BAD4')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective6);

        $manager->persist($objective6);
        $manager->persist($entity);

        $objective7= new Objective();
        $objective7 ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCheckpoint($this->getReference('checkpoint3'))
            ->setNumber(7)
            ->setDescription('J\'ai réussi à  tirer une île au hasard')
            ->setIsBonus(false)
            ->addSkill($dbManipulation);

        $array = new Skill();
        $array->setName('Manipulation tableaux')
            ->setColor('#F2EDD7')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->addObjective($objective7);

        $manager->persist($objective7);
        $manager->persist($array);

        $objective10= new Objective();
        $objective10 ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCheckpoint($this->getReference('checkpoint3'))
            ->setNumber(10)
            ->setDescription('J\'ai réussi à initialiser le jeu')
            ->setIsBonus(false)
            ->addSkill($dbManipulation)
            ->addSkill($validRoute)
            ->addSkill($twig)
            ->addSkill($service);

        $manager->persist($objective10);

        $objective11= new Objective();
        $objective11 ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCheckpoint($this->getReference('checkpoint3'))
            ->setNumber(11)
            ->setDescription('J\'ai réussi à vérifier si j\'ai trouvé un trésor')
            ->setIsBonus(false)
            ->addSkill($dbManipulation)
            ->addSkill($conditions)
            ->addSkill($service);


        $manager->persist($objective11);

        $objective12= new Objective();
        $objective12 ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setCheckpoint($this->getReference('checkpoint3'))
            ->setNumber(12)
            ->setDescription('J\'ai réussi à afficher un message si j\'ai trouvé un trésor')
            ->setIsBonus(false)
            ->addSkill($service)
            ->addSkill($flash);


        $manager->persist($objective11);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CheckpointFixtures::class
        ];
    }
}
