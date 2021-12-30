<?php

namespace App\Controller;

use App\Entity\Objective;
use App\Form\ObjectiveType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        $objective = new Objective();
        $form = $this->createForm(ObjectiveType::class,$objective);

        return $this->renderForm('test/index.html.twig', [
            'form' => $form,
            'active' => 'checkpoints'
        ]);
    }
}
