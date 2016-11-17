<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Person;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("api/persons")
 */
class PersonController extends Controller
{

    /**
     * @Route("/")
     */
    public function personsAction(){

        //all persons (pae la suite ajouter un critère pour chercher par profession)

        $em = $this->getDoctrine()->getManager();
        $persons = $em->getRepository('AppBundle:Person')->findAll();
        $data = array('person' => array());
        foreach ($persons as $person) {
            $data['person'][] = $this->serializePerson($person);
        }

        $response = new JsonResponse($data, 200);

        return $response;
    }

    private function serializePerson(Person $person)
    {
        return array(
            'name' => $person->getName(),
        );
    }

}