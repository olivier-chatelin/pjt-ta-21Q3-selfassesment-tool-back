<?php

namespace App\Controller;

use App\Entity\Checkpoint;
use App\Repository\CheckpointRepository;
use App\Repository\ObjectiveRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckpointController extends AbstractController
{
    /**
     * @Route("/checkpoints", name="checkpoints")
     */
    public function index(CheckpointRepository $checkpointRepository, ObjectiveRepository $objectiveRepository): Response
    {
        $checkpoints = $checkpointRepository->findOrderByNumber();
        $encodedCheckpoints = [];
        foreach ($checkpoints as $checkpoint){
            if($checkpoint->getIsVisible()) {
                $encodedCheckpoints[] =  $checkpoint->jsonSerialize();
            }
        }
        return new JsonResponse($encodedCheckpoints,200,['Access-Control-Allow-Origin' => '*']);
    }
    /**
     * @Route("/checkpoints/{id}", name="show")
     */
    public function show( ObjectiveRepository $objectiveRepository, CheckpointRepository $checkpointRepository,Checkpoint $checkpoint): Response
    {
        $objectives = $objectiveRepository->findBy(['checkpoint'=>$checkpoint]);
        $jsonResponseObjectives = [];
        foreach ($objectives as $objective){
            $jsonResponseSkills = [];
            foreach ($objective->getSkills() as $skill){
                $jsonResponseSkills[] = [
                    "name"=>$skill->getName(),
                    "color" => $skill->getColor()
                    ];
            }
            $jsonResponseObjectives[] = [
                "id"=>$objective->getId(),
                "number"=>$objective->getNumber(),
                "isBonus"=>$objective->getIsBonus(),
                "name"=>$objective->getDescription(),
                "skills"=>$jsonResponseSkills
            ];
        }
        $jsonObject = [
            'id'=>$checkpoint->getId(),
            'curriculum'=>$checkpoint->getCurriculum()->getName(),
            'number'=>$checkpoint->getNumber(),
            'name'=>$checkpoint->getName(),
            'duration'=>$checkpoint->getDuration(),
            'globalSkills' => $checkpoint->getGlobalSkills()[0],
            'objectives'=>$jsonResponseObjectives,

        ];
        return new JsonResponse($jsonObject,200,['Access-Control-Allow-Origin' => '*']);
    }

}
