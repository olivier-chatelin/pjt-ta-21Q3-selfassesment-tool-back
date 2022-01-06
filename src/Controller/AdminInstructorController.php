<?php

namespace App\Controller;

use App\Entity\Instructor;
use App\Form\InstructorType;
use App\Repository\InstructorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/instructor")
 */
class AdminInstructorController extends AbstractController
{
    /**
     * @Route("/", name="admin_instructor", methods={"GET"})
     */
    public function index(InstructorRepository $instructorRepository): Response
    {
        return $this->render('admin_instructor/index.html.twig', [
            'instructors' => $instructorRepository->findAll(),
            'active' => 'instructors'
        ]);
    }

    /**
     * @Route("/new", name="admin_instructor_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $instructor = new Instructor();
        $form = $this->createForm(InstructorType::class, $instructor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($instructor);
            $entityManager->flush();

            return $this->redirectToRoute('admin_instructor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_instructor/new.html.twig', [
            'instructor' => $instructor,
            'form' => $form,
            'active' => 'instructors'

        ]);
    }

    /**
     * @Route("/{id}", name="admin_instructor_show", methods={"GET"})
     */
    public function show(Instructor $instructor): Response
    {
        return $this->render('admin_instructor/show.html.twig', [
            'instructor' => $instructor,
            'active' => 'instructors'

        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_instructor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Instructor $instructor): Response
    {
        $form = $this->createForm(InstructorType::class, $instructor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_instructor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_instructor/edit.html.twig', [
            'instructor' => $instructor,
            'form' => $form,
            'active' => 'instructors'

        ]);
    }

    /**
     * @Route("/{id}", name="admin_instructor_delete", methods={"POST"})
     */
    public function delete(Request $request, Instructor $instructor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$instructor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($instructor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_instructor_index', [], Response::HTTP_SEE_OTHER);
    }
}
