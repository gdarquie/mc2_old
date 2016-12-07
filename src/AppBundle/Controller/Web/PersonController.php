<?php

namespace AppBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class PersonController extends Controller
{
    /**
     * @Route("/person", name = "getPersons")
     */
    public function indexAction()
    {
        return $this->render('web/person/index.html.twig');
    }

    /**
     * @Route("/person/{personId}", name = "getPersons")
     */
    public function getOnePerson($personId){

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT p FROM AppBundle:Person p WHERE p.personId = :personId");
        $query->setParameter('personId', $personId);
        $person = $query->getSingleResult();

        return $this->render('web/person/person.html.twig', array(
            'person' => $person
        ));
    }


}
