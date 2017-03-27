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

    /**
     * @Route("/scenario/2", name = "scenario2")
     */
    public function scenario2Action(){

        $em = $this->getDoctrine()->getManager();

        $param1 = "solo(s)";
        $param2 = "solo(s)";

        $query = $em->createQuery("SELECT n FROM AppBundle:Number n JOIN n.performers p JOIN n.musensemble m JOIN n.dancemble d WHERE m.title = :musensemble AND d.title = :dancemble");
        $query->setParameters(array('musensemble' => $param1 , 'dancemble' => $param2));
        $numbers = $query->getResult();

        $query = $em->createQuery("SELECT p.name as name, COUNT(p.name) as nb FROM AppBundle:Number n JOIN n.performers p JOIN n.musensemble m JOIN n.dancemble d WHERE m.title = :musensemble AND d.title = :dancemble GROUP BY p.name ORDER BY nb DESC");
        $query->setParameters(array('musensemble' => $param1 , 'dancemble' => $param2));
        $performers = $query->getResult();


        return $this->render('AppBundle:scenario:scenario2.html.twig', array(
            'numbers' => $numbers,
            'performers' => $performers
        ));

    }
}
