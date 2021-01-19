<?php

namespace App\Controller;

use App\Entity\Pays;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PaysRepository;

class PaysController extends AbstractController
{
    /**
     * @Route("/pays", name="pays")
     */
    public function index(PaysRepository $repo): Response
    {
        $payss = $repo->findAll();
        return $this->render('pays/index.html.twig', [
            'controller_name' => 'PaysController',
            'payss' =>$payss
        ]);
    }

    /**
     *
     * @Route("/pays/{id}", name="pays_show")
     */
    public function show(Pays $pays): Response
    {
        return $this->render('pays/show.html.twig',[
            'pays' => $pays
        ]);
    }
}
