<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Form\PaysType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PaysRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class PaysController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

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
     * @Route("/pays/new", name="pays_create")
     * @Route("/pays/{id}/edit", name="pays_edit")
     */
    public function form(Pays $pays=null,Request $request){
        if(!$pays){
            $pays= new Pays();
        }
        $form=$this->createForm(PaysType::class,$pays);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if(!$pays->getId()){
                $pays->setCreatedAt(new \DateTime());
            }
            $this->em->persist($pays);
            $this->em->flush();
            return $this->redirectToRoute('pays_show',['id' =>$pays->getId()]);
        }
        return $this->render('pays/create.html.twig',[
            'formPays' => $form->createView(),
            'editMode' => $pays->getId() !==null
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
