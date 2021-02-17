<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Servant;
use App\Form\ServantType;
use App\Repository\ServantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\IsNull;

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
    public function form(Servant $servant=null,Request $request,ServantRepository $serv)
    {
        if(!$servant){
            $servant= new Servant();
        }
        $form= $this->createForm(ServantType::class,$servant);
        $form->handleRequest($request);
        $lastId=0;
        $num=0;
        if($form->isSubmitted() && $form->isValid()){

            if(!$servant->getId()){
                $servant->setCreatedAt(new \DateTime());

                $lastId= $serv->recuperationMaxIdParProisse($servant->getParoisseServant()->getId());

                if ($lastId[0][1]==NULL){
                    $lastId=0;
                }

                $num=$lastId+1;

            }else{
                $lastId= $serv->recuperationMaxIdParProisse($servant->getParoisseServant()->getId());
                $num=$lastId[0][1] +1;
            }

            //Traitement abbreviation Paroisse

            if($num<10){
                $num=sprintf("%03d",$servant->getId());
            }
            if($num>=10 && $servant->getId()<100){
                $num=sprintf("%02d",$servant->getId());
            }
            if($num>=100){
                $num=$servant->getId();
            }
            $abr= $servant->getDateAdhesion()->format("my"). $num .$servant->getParoisseServant()->getAbbreviationParoisse(). "TVE" ;

            $ref= "Reference: " . $abr. " Adresse: " .$servant->getAdresseServant(). " Nom: " .$servant->getNomServant();
            $servant->setReferenceServant($ref);
            $images = $form->get('images')->getData();
            //$fichier= md5(uniqid()).'.'.$images->guessExtension();
            $fichier= $num." ".$abr. " ".$servant->getNomServant(). " " .$servant->getPrenomServant(). '.'.$images->guessExtension();
            $images->move($this->getParameter('images_directory'),$fichier);
            $servant->setPhotoServant($fichier);
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
