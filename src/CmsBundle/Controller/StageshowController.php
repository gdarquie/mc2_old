<?php

namespace CmsBundle\Controller;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Stageshow;
use AppBundle\Form\StageshowType;


class StageshowController extends Controller
{
    /**
     * @Route("/editor/stageshow/add/new", name="stageshow_new")
     */
    public function addAction(Request $request){

        $stageshow = new Stageshow();

        $form = $this->createForm(StageshowType::class, $stageshow);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){

            $stageshow = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $now = new \DateTime();
            $stageshow->setDateCreation($now);
            $stageshow->setLastUpdate($now);

            $em->persist($stageshow);
            $em->flush();

            return $this->redirectToRoute('editor');
        }

        return $this->render('CmsBundle:Stageshow:new.html.twig', array(
            'stageForm' => $form->createView()
        ));
    }

    /**
     * @Route("/editor/stageshow/id/{stageshowId}/edit" , name = "stageshow_edit")
     */
    public function editAction(Request $request, $stageshowId){

        $em = $this->getDoctrine()->getManager();
        $stageshow = $em->getRepository('AppBundle:Stageshow')->findOneByStageshowId($stageshowId);

        $form = $this->createForm(stageshowType::class, $stageshow);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($stageshow);
            $em->flush();
        }

        return $this->render('CmsBundle:Stageshow:edit.html.twig', array(
            'stageshow' => $stageshow,
            'stageForm' => $form->createView()
        ));
    }

}
