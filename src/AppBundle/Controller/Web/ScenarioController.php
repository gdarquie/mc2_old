<?php

namespace AppBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ScenarioController extends Controller
{
    /**
     * @Route("/scenario/1", name = "scenario1")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

//        $param1 = "instrumental+dance";
        $param1 = "song+dance";
        $param2 = "Borrowed from the musical repertoire";


        $query = $em->createQuery("SELECT n FROM AppBundle:Number n JOIN n.performance_thesaurus t WHERE t.title = :performance AND n.source = :source");
        $query->setParameters(array('performance' => $param1 , 'source' => $param2));
        $numbers = $query->getResult();


//        dump($query);die();

        return $this->render('AppBundle:scenario:scenario1.html.twig', array(
            'numbers' => $numbers
        ));
    }
}
