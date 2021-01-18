<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Servant;

class ServantController extends AbstractController
{
    /**
     * @Route("/servant", name="servant")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Servant::class);
        $servants = $repo->findAll();
        return $this->render('servant/index.html.twig', [
            'controller_name' => 'ServantController',
            'servants' => $servants
        ]);
    }

    /**
     *
     * @Route("/servant/{id}", name="servant_show")
     */
    public function show(Servant $servant): Response
    {

        return $this->render('servant/show.html.twig',[

        ]);
    }
}
