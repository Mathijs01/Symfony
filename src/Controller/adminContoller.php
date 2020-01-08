<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin")
 */
class adminContoller extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function homepage()
    {
        return $this->render("views/admin/adminHome.html.twig");
    }


}