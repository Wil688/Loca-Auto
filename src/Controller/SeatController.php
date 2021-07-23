<?php

namespace App\Controller;

use App\Entity\Seat;
use App\Form\SeatType;
use App\Repository\SeatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/seat")
 */
class SeatController extends AbstractController
{
    /**
     * @Route("/", name="seat_index", methods={"GET"})
     */
    public function index(SeatRepository $seatRepository): Response
    {
        return $this->render('seat/index.html.twig', [
            'seats' => $seatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="seat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $seat = new Seat();
        $form = $this->createForm(SeatType::class, $seat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($seat);
            $entityManager->flush();

            return $this->redirectToRoute('seat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('seat/new.html.twig', [
            'seat' => $seat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="seat_show", methods={"GET"})
     */
    public function show(Seat $seat): Response
    {
        return $this->render('seat/show.html.twig', [
            'seat' => $seat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="seat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Seat $seat): Response
    {
        $form = $this->createForm(SeatType::class, $seat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('seat/edit.html.twig', [
            'seat' => $seat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="seat_delete", methods={"POST"})
     */
    public function delete(Request $request, Seat $seat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($seat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('seat_index', [], Response::HTTP_SEE_OTHER);
    }
}
