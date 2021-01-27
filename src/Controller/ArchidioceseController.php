<?php

namespace App\Controller;

use App\Entity\Archidiocese;
use App\Form\ArchidioceseType;
use App\Repository\ArchidioceseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArchidioceseController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;

    }
    /**
     * @Route("/archidiocese", name="archidiocese")
     */
    public function index(ArchidioceseRepository $repo): Response
    {
        $archidioceses= $repo->findAll();
        return $this->render('archidiocese/index.html.twig', [
            'controller_name' => 'ArchidioceseController',
            'archidioceses' =>$archidioceses
        ]);
    }

    /**
     * @Route("/archidiocese/new", name="archidiocese_create")
     * @Route("/archidiocese/{id}/edit", name="archidiocese_edit")
     */
    public function form(Archidiocese $archidiocese=null, Request $request)
    {
        if(!$archidiocese){
            $archidiocese=new Archidiocese();
        }
        $form= $this->createForm(ArchidioceseType::class,$archidiocese);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            if(!$archidiocese->getId()){
                $archidiocese->setCreatedAt(new \DateTime());
            }
            $this->em->persist($archidiocese);
            $this->em->flush();
            return $this->redirectToRoute('archidiocese_show',['id' =>$archidiocese->getId()]);
        }
        return $this->render('archidiocese/create.html.twig',[
            'formArchidiocese' => $form->createView(),
            'editMode' =>$archidiocese->getId()!==null
        ]);
    }

    /**
     * @Route("/archidiocese/{id}", name="archidiocese_show")
     */
    public function show(Archidiocese $archidiocese):Response
    {
        return $this->render('archidiocese/show.html.twig',[
            'archidiocese' => $archidiocese
        ]);
    }
}
