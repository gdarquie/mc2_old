<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Number;
use AppBundle\Form\NumberType;

class NumberController extends Controller
{
    /**
     * @Route("/numbers", name = "numbers")
     */
    public function showAllAction(){

        $em = $this->getDoctrine()->getManager();
        $numbers = $em->getRepository('AppBundle:Number')->findAll();

        return $this->render('web/number/numbers.html.twig',array(
            'numbers' => $numbers
        ));
    }

    /**
     * @Route("/number/{id}", name = "number")
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        $number = $em->getRepository('AppBundle:Number')->findOneById($id);

        return $this->render('web/number/number.html.twig',array(
            'number' => $number
        ));
    }
}


