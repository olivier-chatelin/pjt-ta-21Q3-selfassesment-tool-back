<?php

namespace App\Controller;

use App\Entity\Curriculum;
use App\Form\CurriculumType;
use App\Repository\CurriculumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/curriculum", name="admin_")
 */
class CurriculumController extends AbstractController
{
    /**
     * @Route("/", name="curriculum", methods={"GET"})
     */
    public function index(CurriculumRepository $curriculumRepository): Response
    {
        return $this->render('curriculum/index.html.twig', [
            'curricula' => $curriculumRepository->findAll(),
            'active' => 'curricula'
        ]);
    }

    /**
     * @Route("/new", name="curriculum_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $curriculum = new Curriculum();
        $form = $this->createForm(CurriculumType::class, $curriculum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($curriculum);
            $entityManager->flush();

            return $this->redirectToRoute('admin_curriculum', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('curriculum/new.html.twig', [
            'curriculum' => $curriculum,
            'form' => $form,
            'active' => 'curricula'
        ]);
    }


    /**
     * @Route("/{id}/edit", name="curriculum_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Curriculum $curriculum): Response
    {
        $form = $this->createForm(CurriculumType::class, $curriculum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_curriculum', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('curriculum/edit.html.twig', [
            'curriculum' => $curriculum,
            'form' => $form,
            'active' => 'curricula'
        ]);
    }

    /**
     * @Route("/{id}", name="curriculum_delete", methods={"POST"})
     */
    public function delete(Request $request, Curriculum $curriculum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$curriculum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($curriculum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_curriculum', [], Response::HTTP_SEE_OTHER);
    }
}
