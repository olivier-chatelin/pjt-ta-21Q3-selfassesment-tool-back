<?php

namespace App\Controller;

use App\Entity\Checkpoint;
use App\Entity\Objective;
use App\Form\CheckpointType;
use App\Repository\CheckpointRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/checkpoint")
 */
class AdminCheckpointController extends AbstractController
{
    /**
     * @Route("/", name="admin_home", methods={"GET"})
     */
    public function index(CheckpointRepository $checkpointRepository): Response
    {
        return $this->render('admin_checkpoint/index.html.twig', [
            'checkpoints' => $checkpointRepository->findAll(),
            'active' => 'checkpoints'
        ]);
    }

    /**
     * @Route("/new", name="admin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $checkpoint = new Checkpoint();
        $form = $this->createForm(CheckpointType::class, $checkpoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($checkpoint);
            $entityManager->flush();

            return $this->redirectToRoute('admin_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_checkpoint/new.html.twig', [
            'checkpoint' => $checkpoint,
            'form' => $form,
            'active' => 'checkpoints'

        ]);
    }

    /**
     * @Route("/{id}", name="admin_show", methods={"GET"})
     */
    public function show(Checkpoint $checkpoint): Response
    {
        return $this->render('admin_checkpoint/show.html.twig', [
            'checkpoint' => $checkpoint,
            'active' => 'checkpoints'

        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Checkpoint $checkpoint): Response
    {
        $form = $this->createForm(CheckpointType::class, $checkpoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_checkpoint_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_checkpoint/edit.html.twig', [
            'checkpoint' => $checkpoint,
            'form' => $form,
            'active' => 'checkpoints'

        ]);
    }

    /**
     * @Route("/{id}", name="admin_delete", methods={"POST"})
     */
    public function delete(Request $request, Checkpoint $checkpoint): Response
    {
        if ($this->isCsrfTokenValid('delete'.$checkpoint->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($checkpoint);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
