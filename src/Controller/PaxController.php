<?php

namespace App\Controller;

use App\Entity\Pax;
use App\Entity\Group;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PaxController extends AbstractController
{
   

      /**
     * @Route("/pax", name="pax")
     * * @ParamConverter("post", options={"id" = "group_id"})
     */
    public function pax(Request $request){
       
       
        $entityManager = $this->getDoctrine()->getManager();
        
        $pax = new Pax();
        $nombrep= $request->get('nombrep');


        for ($i = 0; $i <= $nombrep; $i++) {
            
        $form = $this->createFormBuilder($pax)
      
          
            ->add('age')
            ->getForm();
           
           
        $form->HandleRequest($request);
  
        if ($form->isSubmitted() && $form->isValid()) {
          
            $groupp = $request->get('id');
            $entityManager->persist($pax);
            $entityManager->flush();
            
          // return $this->redirectToRoute('pax',['id' =>$group ->getId(),
           // 'nombrep'=>$group ->getnombrep(),
            
           // ]);

        }
    }
        
        return $this->render('pax/index.html.twig', ['formPersonne' => $form->createView() ]);
      
    }
}
