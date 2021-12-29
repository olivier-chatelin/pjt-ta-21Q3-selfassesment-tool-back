<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/admin", name="admin_")
     */
class AdminPrivilegeController extends AbstractController
{

    /**
     * @Route("/privileges", name="privileges")
     * @IsGranted("ROLE_ADMIN")
     */
    public function privileges(UserRepository $repository): Response
    {
        $users = $repository->findAll();
        $keyToRemove = 0;
        foreach ($users as $key=>$user) {
            if($user->getUserIdentifier() === $this->getUser()->getUserIdentifier()) {
                $keyToRemove = $key;
            }
        }
        unset($users[$keyToRemove]);
        return $this->render('admin_privileges/privileges.html.twig', [
            'users' => $users,
            'active' => 'privileges'
        ]);
    }
    /**
     * @Route("/privileges/update/{id}", name="privileges_update")
     * @IsGranted("ROLE_ADMIN")
     */
    public function privilegesUpdate(User $user, EntityManagerInterface $entityManager): Response
    {
        if (in_array('ROLE_ADMIN',$user->getRoles())) {
            $user->setRoles(['ROLE_USER']);
        } else {
            $user->setRoles(['ROLE_ADMIN']);
        }
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->redirectToRoute('admin_privileges');
    }
}
