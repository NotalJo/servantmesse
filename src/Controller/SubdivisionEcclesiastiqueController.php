<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubdivisionEcclesiastiqueController extends AbstractController
{
    /**
     * @Route("/subdivision/ecclesiastique", name="subdivision_ecclesiastique")
     */
    public function index(): Response
    {
        return $this->render('subdivision_ecclesiastique/index.html.twig', [
            'controller_name' => 'SubdivisionEcclesiastiqueController',
        ]);
    }
}
