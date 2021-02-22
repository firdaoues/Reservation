<?php

namespace App\Controller;

use App\Entity\Group;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="reservation")
     */
    public function index(): Response
    {
        return $this->render('reservation/reservation.html.twig', [
            'controller_name' => 'PaxController',
           
        ]);
    }

     /**
     * @Route("/", name="home")
     */
    public function home(Request $request){
        
        $entityManager = $this->getDoctrine()->getManager();

        $group = new Group();

        $form = $this->createFormBuilder($group)

            ->add('nombrep')
            
            ->getForm();

        
        $form->HandleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($group);
            $entityManager->flush();

           return $this->redirectToRoute('pax',['id' =>$group ->getId(),
            'nombrep'=>$group ->getnombrep(),
            
            ]);

        }
        return $this->render('reservation/home.html.twig', ['formGroup' => $form->createView() ]);
      
    }

   
}
