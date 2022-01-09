<?php

namespace App\Controller;

use App\Service\ChartDataRetriever;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/admin/result", name="admin_result_")
     */
class AdminResultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ChartDataRetriever $chartDataRetriever): Response
    {
        $chartProgressData = $chartDataRetriever->getProgressionData($this->getUser()->getResults());
        $chartRadarData = $chartDataRetriever->getRadarData($this->getUser()->getResults());
//        foreach ($chatRadarData = )
        return $this->render('admin_result/index.html.twig', [
            'active' => 'results',
            'chartProgressData' => json_encode($chartProgressData),
            'chartRadarData' => json_encode($chartRadarData)
        ]);
    }
}
