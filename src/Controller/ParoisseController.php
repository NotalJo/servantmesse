<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParoisseController extends AbstractController
{
    /**
     * @Route("/paroisse", name="paroisse")
     */
    public function index(): Response
    {
        return $this->render('paroisse/index.html.twig', [
            'controller_name' => 'ParoisseController',
        ]);
    }
}
