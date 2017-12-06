<?php

namespace QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        //quelques questions amusantes

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n');
        $filmsWithNumber = $query->getResult();

        $query = $em->createQuery('SELECT n.title title, f.title as film FROM AppBundle:Number n JOIN n.dancing_type t JOIN n.film f JOIN n.performers as p WHERE t.id = :id AND p.personId = :person');
        $query->setParameter('id', 391);
        $query->setParameter('person', 638);
        $quizz = $query->getResult();

        $payload = [];
        $payload['filmsWithNumber'] = $filmsWithNumber;
        $payload['quizz'] = $quizz;


        return $this->render('QuizzBundle:Default:index.html.twig', array(
            "payload" => $payload
        ));
    }
}
