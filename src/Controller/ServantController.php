<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Servant;
use App\Form\ServantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ServantController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em= $entityManager;
    }
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
     * @Route("/servant/new", name="servant_create")
     * @Route("/servant/{id}/edit", name="servant_edit")
     */
    public function form(Servant $servant=null,Request $request)
    {
        if(!$servant){
            $servant= new Servant();
        }
        $form= $this->createForm(ServantType::class,$servant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if(!$servant->getId()){
                $servant->setCreatedAt(new \DateTime());
            }
            $images = $form->get('images')->getData();
            $fichier= md5(uniqid()).'.'.$images->guessExtension();
            $images->move($this->getParameter('images_directory'),$fichier);
            $servant->setPhotoServant($fichier);
            $servant->setReferenceServant("test1");
            $this->em->persist($servant);
            $this->em->flush();
            return $this->redirectToRoute('servant_show',[
                'id' => $servant->getId()

            ]);
        }
        return $this->render('/servant/create.html.twig',[
            'formServant' =>$form->createView(),
            'editMode' =>$servant->getId() != null,
            'servant' =>$servant
        ]);
    }

    /**
     *
     * @Route("/servant/{id}", name="servant_show")
     */
    public function show(Servant $servant): Response
    {

        return $this->render('servant/show.html.twig',[
            'servant' =>$servant
        ]);
    }
}
