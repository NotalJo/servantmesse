<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArchidioceseController extends AbstractController
{
    /**
     * @Route("/archidiocese", name="archidiocese")
     */
    public function index(): Response
    {
        return $this->render('archidiocese/index.html.twig', [
            'controller_name' => 'ArchidioceseController',
        ]);
    }
}
