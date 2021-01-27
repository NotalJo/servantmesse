<?php

namespace App\Controller;

use App\Entity\SubdivisionEcclesiastique;
use App\Form\SubdivisionEcclesiastiqueType;
use App\Repository\SubdivisionEcclesiastiqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubdivisionEcclesiastiqueController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em=$entityManager;
    }
    /**
     * @Route("/subdivision/ecclesiastique", name="subdivision_ecclesiastique")
     */
    public function index(SubdivisionEcclesiastiqueRepository $repo): Response
    {
        $subDivEcclesiastiques =$repo->findAll();
        return $this->render('subdivision_ecclesiastique/index.html.twig', [
            'controller_name' => 'SubdivisionEcclesiastiqueController',
            'subDivEcclesiastiques' =>$subDivEcclesiastiques
        ]);
    }

    /**
     *
     *
     *@Route("/subdivision/ecclesiastique/new", name="subdivision_ecclesiastique_create")
     *@Route("/subdivision/ecclesiastique/{id}/edit", name="subdivision_ecclesiastique_edit")
     *
     */
    public function form(SubdivisionEcclesiastique $subDivEcclesiastique=null, Request $request)
    {
        if(!$subDivEcclesiastique){
            $subDivEcclesiastique=new SubdivisionEcclesiastique();
        }

        $form= $this->createForm(SubdivisionEcclesiastiqueType::class,$subDivEcclesiastique);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if(!$subDivEcclesiastique->getId()){
                $subDivEcclesiastique->setCreatedAt(new \DateTime());
            }

            $this->em->persist($subDivEcclesiastique);
            $this->em->flush();
            return $this->redirectToRoute('subdivision_ecclesiastique_show',[
                'id' => $subDivEcclesiastique->getId()
            ]);
        }
        return $this->render('/subdivision_ecclesiastique/create.html.twig',[
            'formSudvisionEcclesiastique' => $form->createView(),
            'editMode' =>$subDivEcclesiastique->getId() !== null
        ]);
    }

    /**
     *
     *@Route("/subdivision/ecclesiastique/{id}", name="subdivision_ecclesiastique_show")
     *
     */
    public function show(SubdivisionEcclesiastique $subDivEcclesiastique){
        return $this->render('/subdivision_ecclesiastique/show.html.twig',[
            'subdivisionEcclesiastique' => $subDivEcclesiastique
        ]);
    }
}
