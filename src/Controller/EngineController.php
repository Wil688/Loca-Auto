<?php

namespace App\Controller;

use App\Entity\Engine;
use App\Form\EngineType;
use App\Repository\EngineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/engine")
 */
class EngineController extends AbstractController
{
    /**
     * @Route("/", name="engine_index", methods={"GET"})
     */
    public function index(EngineRepository $engineRepository): Response
    {
        return $this->render('engine/index.html.twig', [
            'engines' => $engineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="engine_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $engine = new Engine();
        $form = $this->createForm(EngineType::class, $engine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($engine);
            $entityManager->flush();

            return $this->redirectToRoute('engine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('engine/new.html.twig', [
            'engine' => $engine,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="engine_show", methods={"GET"})
     */
    public function show(Engine $engine): Response
    {
        return $this->render('engine/show.html.twig', [
            'engine' => $engine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="engine_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Engine $engine): Response
    {
        $form = $this->createForm(EngineType::class, $engine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('engine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('engine/edit.html.twig', [
            'engine' => $engine,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="engine_delete", methods={"POST"})
     */
    public function delete(Request $request, Engine $engine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$engine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($engine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('engine_index', [], Response::HTTP_SEE_OTHER);
    }
}
