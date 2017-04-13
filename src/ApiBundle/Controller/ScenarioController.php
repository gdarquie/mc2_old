<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\Number;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("api/scenario")
 */
class ScenarioController extends Controller
{

    /**
     * @Route("/marion/quotation", name="api_marion_quotation")
     */
    public function marionquotationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT n.numberId as numberId, n.title as title FROM AppBundle:Number n JOIN n.quotation q WHERE q.title IS NOT NULL');
        $numbers = $query->getResult();

        $response = new JsonResponse($numbers, 200);

        return $response;
    }

}

