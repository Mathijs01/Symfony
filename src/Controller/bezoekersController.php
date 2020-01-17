<?php

namespace App\Controller;

use App\Repository\GedragsregelsRepository;
use App\Repository\LessonRepository;
use App\Repository\TrainingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class bezoekersController extends AbstractController
{
    /**
 * @Route("/home", name="homepagina")
 */
    public function homepage()
    {
        return $this->render("views/bezoeker/home.html.twig");
    }

    /**
     * @Route("/contact", name="contactpagina")
     */
    public function contactpage()
    {
        return $this->render("views/bezoeker/contact.html.twig");
    }

//    /**
//     * @Route("/training", name="trainingpagina")
//     */
//    public function trainingpage()
//    {
//        return $this->render("views/bezoeker/training.html.twig");
//    }

    /**
     * @Route("/inschrijven", name="inschrijfpagina")
     */
    public function inschrijfpage()
    {
        return $this->render("views/bezoeker/inschrijven.html.twig");
    }
    /**
     * @Route ("/training", name="trainingpage")
     */
    public function trainingpage(TrainingRepository $trainingRepository):Response
    {
        return $this->render('views/bezoeker/training.html.twig', [
            'trainings' => $trainingRepository->findAll(),
        ]);
    }
    /**
     * @Route ("/lesson", name="lessenpage")
     */
    public function lessenpage(LessonRepository $LessonRepository):Response
    {
        return $this->render('views/bezoeker/lessen.html.twig', [
            'lessen' => $LessonRepository->findAll(),
        ]);
    }
    /**
     * @Route("/regels", name="gedragregelspagina")
     */
    public function rulespage(GedragsregelsRepository $GedragsregelsRepository):Response
    {
        return $this->render('views/bezoeker/regels.html.twig', [
            'regels' => $GedragsregelsRepository->findAll(),
        ]);
    }
}