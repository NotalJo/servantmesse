<?php

namespace App\Controller;

use App\Entity\Pays;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaysController extends AbstractController
{
    /**
     * @Route("/pays", name="pays")
     */
    public function index(): Response
    {
        $repo= $this->getDoctrine()->getRepository(Pays::class);
        $payss = $repo->findAll();
        return $this->render('pays/index.html.twig', [
            'controller_name' => 'PaysController',
            'payss' =>$payss
        ]);
    }

    /**
     *
     * @Route("/pays/12", name="pays_show")
     */
    public function show(): Response
    {
        return $this->render('pays/show.html.twig');
    }
}
