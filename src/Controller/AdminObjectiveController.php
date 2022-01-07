<?php

namespace App\Controller;

use App\Entity\Checkpoint;
use App\Entity\Objective;
use App\Form\ObjectiveType;
use App\Repository\ObjectiveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/objective")
 */
class AdminObjectiveController extends AbstractController
{

    /**
     * @Route("/new/{id}", name="admin_objective_new", methods={"GET","POST"})
     */
    public function new(Request $request, Checkpoint $checkpoint): Response
    {
        $objective = new Objective();
        $form = $this->createForm(ObjectiveType::class, $objective)
            ->add('number') ;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objective->setCheckpoint($checkpoint);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objective);
            $entityManager->flush();

            return $this->redirectToRoute('admin_show', ['id' => $checkpoint->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_objective/new.html.twig', [
            'objective' => $objective,
            'form' => $form,
            'checkpoint' => $checkpoint,
            'active' => 'checkpoints',

        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_objective_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Objective $objective): Response
    {
        $form = $this->createForm(ObjectiveType::class, $objective)->add('number');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_show', ['id' => $objective->getCheckpoint()->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_objective/edit.html.twig', [
            'objective' => $objective,
            'form' => $form,
            'active' => 'checkpoints'

        ]);
    }

    /**
     * @Route("/{id}", name="admin_objective_delete", methods={"POST"})
     */
    public function delete(Request $request, Objective $objective): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objective->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objective);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_show',  ['id' => $objective->getCheckpoint()->getId()], Response::HTTP_SEE_OTHER);
    }
}
