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
 * @Route("/", name="homepagina")
 */
    public function homepage()
    {
        return $this->render("views/bezoeker/home.html.twig");
    }

    /**
     * @Route ("/trainings-aanbod", name="trainingpage")
     */
    public function trainingAanbod(TrainingRepository $trainingRepository):Response
    {
        return $this->render('views/bezoeker/training.html.twig', [
            'trainings' => $trainingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/lid-worden", name="inschrijfpagina")
     */
    public function lidWorden()
    {
        return $this->render("views/bezoeker/inschrijven.html.twig");
    }

    /**
     * @Route("/gedragsregels", name="gedragregelspagina")
     */
    public function rulespage(GedragsregelsRepository $GedragsregelsRepository):Response
    {
        return $this->render('views/bezoeker/regels.html.twig', [
            'regels' => $GedragsregelsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contact", name="contactpagina")
     */
    public function contact()
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
     * @Route ("/lesson", name="lessenpage")
     */
    public function lessenpage(LessonRepository $LessonRepository):Response
    {
        return $this->render('views/bezoeker/lessen.html.twig', [
            'lessen' => $LessonRepository->findAll(),
        ]);
    }


}