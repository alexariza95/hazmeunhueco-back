<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Entity\Journey;
use App\Form\JourneyType;
use App\Repository\JourneyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/journey")
 */
class JourneyController extends AbstractController
{
    /**
     * @Route("/", name="journey_index", methods={"GET"})
     */
    public function index(JourneyRepository $journeyRepository): Response
    {
        return $this->render('journey/index.html.twig', [
            'journeys' => $journeyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="journey_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $journey = new Journey();
        $form = $this->createForm(JourneyType::class, $journey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($journey);
            $entityManager->flush();

            return $this->redirectToRoute('journey_index');
        }

        return $this->render('journey/new.html.twig', [
            'journey' => $journey,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="journey_show", methods={"GET"})
     */
    public function show(Journey $journey): Response
    {
        return $this->render('journey/show.html.twig', [
            'journey' => $journey,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="journey_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Journey $journey): Response
    {
        $form = $this->createForm(JourneyType::class, $journey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('journey_index', [
                'id' => $journey->getId(),
            ]);
        }

        return $this->render('journey/edit.html.twig', [
            'journey' => $journey,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="journey_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Journey $journey): Response
    {
        if ($this->isCsrfTokenValid('delete'.$journey->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($journey);
            $entityManager->flush();
        }

        return $this->redirectToRoute('journey_index');
    }
}
