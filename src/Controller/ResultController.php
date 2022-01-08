<?php

namespace App\Controller;

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
        $guillaume = $doctrine->getRepository(User::class)->findOneBy(['lastname'=>'Harari']);
        $resultData = $request->getContent();
        $result = new Result();
        $result->setSerialized(json_decode($resultData,true));
        $result->setUser($guillaume);
        $manager->persist($result);
        $manager->flush();
        return new JsonResponse('Result ok',200,['Access-Control-Allow-Origin' => '*']);
    }
}
