<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Stagenumber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class StagenumberController extends Controller
{
//    /**
//     * @Route("/stagenumbers", name = "stagenumbers")
//     */
//    public function indexAction()
//    {
//
//        $em = $this->getDoctrine()->getManager();
//        $stagenumbers = $em->getRepository('AppBundle:Stagenumber')->findAll();
//
//        return $this->render('AppBundle:stagenumber:index.html.twig' , array(
//            'stagenumbers' => $stagenumbers
//        ));
//    }
//
    /**
     * @Route("stagenumber/id/{stagenumberId}", name="stagenumber")
     */
    public function showAction($stagenumberId){

        $em = $this->getDoctrine()->getManager();
        $stagenumber = $em->getRepository('AppBundle:Stagenumber')->findOneByStagenumberId($stagenumberId);

        return $this->render('AppBundle:stagenumber:stagenumber.html.twig',array(
            'stagenumber' => $stagenumber
        ));
    }




    /**
     * Effacer un item
     *
     * @Route("editor/stagenumber/id/{id}/delete", name="stagenumber_delete")
     * @Method({"DELETE","GET"})
     */
    public function deleteAction(Stagenumber $item)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        if (!$item) {
            throw $this->createNotFoundException('No item found');
        }

        $em = $this->getDoctrine()->getManager();

        $em->remove($item);
        $em->flush();

        $this->addFlash('success', 'Deleted Successfully!');
        return $this->redirectToRoute('admin');
    }

}