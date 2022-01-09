<?php

namespace App\Controller;

use App\Entity\Checkpoint;
use App\Entity\Result;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{
    /**
     * @Route("/results", name="result", methods={"POST","GET"})
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $manager = $doctrine->getManager();
        $checkpointRepository = $manager->getRepository(Checkpoint::class);
        $resultData = json_decode($request->getContent());
        $instructor = $doctrine->getRepository(User::class)->findOneBy(['fullName'=>$resultData->instructor]);
        $result = new Result();
        $result->setStudent($resultData->fullName);
        $result->setCheckpoint($checkpointRepository->findOneBy(['id'=>$resultData->checkpointId]));
        $result->setSerialized($resultData->data);
        $result->setUser($instructor);
        $manager->persist($result);
        $manager->flush();
        return new JsonResponse('Result ok',200,['Access-Control-Allow-Origin' => '*']);
    }
}
