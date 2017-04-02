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
     * @Route("/number/{numberId}", name = "number")
     */
    public function showAction($numberId){
        $em = $this->getDoctrine()->getManager();
        $number = $em->getRepository('AppBundle:Number')->findOneByNumberId($numberId);

        return $this->render('web/number/number.html.twig',array(
            'number' => $number
        ));
    }
}


