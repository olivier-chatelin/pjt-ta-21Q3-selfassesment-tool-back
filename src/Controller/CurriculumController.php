<?php

namespace App\Controller;

use App\Entity\Curriculum;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurriculumController extends AbstractController
{
    /**
     * @Route("/curriculum", name="curriculum", methods={"GET"})
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $names = $managerRegistry->getRepository(Curriculum::class)->findCurriculaNames();
        return new JsonResponse(json_encode($names),200,['Access-Control-Allow-Origin' => '*']);
    }
}
