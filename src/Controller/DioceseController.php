<?php

namespace App\Controller;

use App\Entity\Diocese;
use App\Form\DioceseType;
use App\Repository\DioceseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DioceseController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em=$entityManager;
    }
    /**
     * @Route("/diocese", name="diocese")
     */
    public function index(DioceseRepository $repo): Response
    {
        $dioceses= $repo->findAll();
        return $this->render('diocese/index.html.twig', [
            'controller_name' => 'DioceseController',
            'dioceses' => $dioceses
        ]);
    }

    /**
     *
     *@Route("/diocese/new", name="diocese_create")
     *@Route("/diocese/{id}/edit", name="diocese_edit")
     */
    public function form(Diocese $diocese=null, Request $request)
    {
        if(!$diocese){
            $diocese= new Diocese();
        }
        $form=$this->createForm(DioceseType::class,$diocese);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if(!$diocese->getId()){
                $diocese->setCreatedAt(new \DateTime());
            }
            $this->em->persist($diocese);
            $this->em->flush();

            return $this->redirectToRoute('diocese_show',['id' => $diocese->getId()]);
        }
        return $this->render('/diocese/create.html.twig',[
            'formDiocese' => $form->createView(),
            'editMode' => $diocese->getId() !== null
        ]);
    }

    /**
     * @Route("/diocese/{id}", name="diocese_show")
     */
    public function show(Diocese $diocese): Response
    {
        return $this->render('/diocese/show.html.twig',[
            'diocese' => $diocese
        ]);
    }
}
