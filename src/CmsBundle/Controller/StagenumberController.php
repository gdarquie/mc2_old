<?php

namespace CmsBundle\Controller;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Stagenumber;
use AppBundle\Form\StagenumberType;

class StagenumberController extends Controller
{
    /**
     * @Route("/editor/stagenumber/add/new", name="stagesnumber_new")
     */
    public function addAction(Request $request){

        $stagenumber = new Stagenumber();

        $form = $this->createForm(StagenumberType::class, $stagenumber);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){

            $stagenumber = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $now = new \DateTime();
            $stagenumber->setDateCreation($now);
            $stagenumber->setLastUpdate($now);

            $em->persist($stagenumber);
            $em->flush();

            return $this->redirectToRoute('editor');
        }

        return $this->render('CmsBundle:Stagenumber:new.html.twig', array(
            'stagenumberForm' => $form->createView()
        ));
    }

    /**
     * @Route("/editor/stagenumber/id/{stagenumberId}/edit" , name = "stagenumber_edit")
     */
    public function editAction(Request $request, $stagenumberId){

        $em = $this->getDoctrine()->getManager();
        $stagenumber = $em->getRepository('AppBundle:Stagenumber')->findOneByStagenumberId($stagenumberId);

        $form = $this->createForm(stagenumberType::class, $stageshow);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $stagenumber = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $now = new \DateTime();
            $stagenumber->setLastUpdate($now);

            $em->persist($stagenumber);
            $em->flush();
        }

        return $this->render('CmsBundle:Stagenumber:edit.html.twig', array(
            'stagenumber' => $stagenumber,
            'stagenumberForm' => $form->createView()
        ));
    }

}
