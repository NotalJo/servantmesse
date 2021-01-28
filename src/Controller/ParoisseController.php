<?php

namespace App\Controller;

use App\Entity\Paroisse;
use App\Form\ParoisseType;
use App\Repository\ParoisseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParoisseController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em=$entityManager;
    }

    /**
     * @Route("/paroisse", name="paroisse")
     */
    public function index(ParoisseRepository $repo): Response
    {
        $paroisses= $repo->findAll();
        return $this->render('paroisse/index.html.twig', [
            'controller_name' => 'ParoisseController',
            'paroisses' =>$paroisses
        ]);
    }

    /**
     *
     *
     * @Route("/paroisse/new" , name="paroisse_create")
     * @Route("/paroisse/{id}/edit", name="paroisse_edit")
     */
    public function form(Paroisse $paroisse=null, Request $request){
        if(!$paroisse){
            $paroisse= new Paroisse();
        }
        $form= $this->createForm(ParoisseType::class,$paroisse);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if(!$paroisse->getId()){
                $paroisse->setCreatedAt(new \DateTime());
            }
            $this->em->persist($paroisse);
            $this->em->flush();
            return $this->redirectToRoute('paroisse_show',[
                'id' => $paroisse->getId()
            ]);
        }
        return $this->render('/paroisse/create.html.twig',[
            'formParoisse' => $form->createView(),
            'editMode' => $paroisse->getId() !== null
        ]);
    }

    /**
     *
     *
     * @Route("/paroisse/{id}", name="paroisse_show")
     */
    public function show(Paroisse $paroisse){
        return $this->render('/paroisse/show.html.twig',[
            'paroisse' =>$paroisse
        ]);
    }
}
