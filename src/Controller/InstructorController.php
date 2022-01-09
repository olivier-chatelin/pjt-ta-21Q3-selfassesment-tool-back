<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstructorController extends AbstractController
{
    /**
     * @Route("/instructors", name="instructors")
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $users = $managerRegistry->getRepository(User::class)->findAll();
        $names = [];
        foreach ($users as $user) {
            if(in_array('ROLE_INSTRUCTOR',$user->getRoles())) {
                $names[] = $user->getFullName();
            }
        }
        return new JsonResponse(json_encode($names),200,['Access-Control-Allow-Origin' => '*']);

    }
}
