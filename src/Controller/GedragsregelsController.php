<?php

namespace App\Controller;

use App\Entity\Gedragsregels;
use App\Form\GedragsregelsType;
use App\Repository\GedragsregelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/gedrag")
 */
class GedragsregelsController extends AbstractController
{
    /**
     * @Route("/", name="gedragsregels_index", methods={"GET"})
     */
    public function index(GedragsregelsRepository $gedragsregelsRepository): Response
    {
        return $this->render('gedragsregels/index.html.twig', [
            'gedragsregels' => $gedragsregelsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gedragsregels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gedragsregel = new Gedragsregels();
        $form = $this->createForm(GedragsregelsType::class, $gedragsregel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gedragsregel);
            $entityManager->flush();

            return $this->redirectToRoute('gedragsregels_index');
        }

        return $this->render('gedragsregels/new.html.twig', [
            'gedragsregel' => $gedragsregel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gedragsregels_show", methods={"GET"})
     */
    public function show(Gedragsregels $gedragsregel): Response
    {
        return $this->render('gedragsregels/show.html.twig', [
            'gedragsregel' => $gedragsregel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gedragsregels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gedragsregels $gedragsregel): Response
    {
        $form = $this->createForm(GedragsregelsType::class, $gedragsregel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gedragsregels_index');
        }

        return $this->render('gedragsregels/edit.html.twig', [
            'gedragsregel' => $gedragsregel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gedragsregels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gedragsregels $gedragsregel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gedragsregel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gedragsregel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gedragsregels_index');
    }
}
