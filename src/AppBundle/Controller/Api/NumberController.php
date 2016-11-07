<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Number;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("api/numbers")
 */
class NumberController extends Controller
{

    /**
     * @Route("/")
     */
    public function filmsByAction(){

        //retourner les titres de tous les films par ordre alphabétique

        $em = $this->getDoctrine()->getManager();
        $numbers = $em->getRepository('AppBundle:Number')->findAll();
        $data = array('number' => array());
        foreach ($numbers as $number) {
            $data['number'][] = $this->serializeNumber($number);
        }

        $response = new JsonResponse($data, 200);

        return $response;
    }

    private function serializeNumber(Number $number)
    {
        return array(
            'title' => $number->getTitle(),
            'film' => $number->getFilm()->getTitle(),
        );
    }

}
