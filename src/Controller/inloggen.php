<?php


namespace App\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class inloggen extends AbstractController
{
    /**
     * @Route("/inloggen", name="inlogpagina")
     */
    public function inlogpage()
    {
        return $this->render("article/inloggen.html.twig");
    }
}