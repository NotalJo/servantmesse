<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DioceseController extends AbstractController
{
    /**
     * @Route("/diocese", name="diocese")
     */
    public function index(): Response
    {
        return $this->render('diocese/index.html.twig', [
            'controller_name' => 'DioceseController',
        ]);
    }
}
