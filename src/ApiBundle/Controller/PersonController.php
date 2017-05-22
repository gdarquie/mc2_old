<?php

namespace ApiBundle\Controller;

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
            'personId' => $person->getPersonId(),
            'name' => $person->getName()
        );
    }

    /**
     * @Route("/melviz/diegetic/{personId}", name="api_person_melviz_diegetic")
     */
    public function getMelvizDiegetic($personId)
    {
        $em = $this->getDoctrine()->getManager();

        //total diegetics for each diegetics for all
        $query = $em->createQuery("SELECT COUNT(t.title) as nb, t.title FROM AppBundle:Number n JOIN n.diegetic_thesaurus t GROUP BY t.title ORDER BY nb DESC");
        $diegetics = $query->getResult();

        //total diegetics for each diegetics for one person
        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.diegetic_thesaurus t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $diegetic = $query->getResult();

        //total of numbers with a diegetic
        $query = $em->createQuery("SELECT COUNT(n.numberId) as nb FROM AppBundle:Number n JOIN n.diegetic_thesaurus t ");
        $totalNumbers = $query->getSingleResult();
//
        //total of numbers with a diegetic for the person
        $query = $em->createQuery("SELECT COUNT(n.numberId) as nb FROM AppBundle:Number n JOIN n.diegetic_thesaurus t JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId );
        $totalNumbersForPerson = $query->getSingleResult();


        $diegeticsArray = array();
        for ($i = 0; $i < count($diegetics); $i++) {

            //ajouter une condition si est nul
            $requete = $diegetics[$i]['title'];
            if(!ISSET($diegetic[$i]['nb'])){
                $requete2 = 0;
            }
            else{
                $requete2 = $diegetic[$i]['nb'];
            }
            $requete3 = $diegetics[$i]['nb'];

            $key = $i;

            $diegeticsArray[$key]['label'] = $requete;
            $diegeticsArray[$key]['one_item'] = round((intval($requete2) / intval($totalNumbersForPerson['nb'])) * 100, 1, PHP_ROUND_HALF_UP);
            $diegeticsArray[$key]['all_items'] = round((intval($requete3) / intval($totalNumbers['nb'])) * 100, 1, PHP_ROUND_HALF_UP);

        }

        return new JsonResponse($diegeticsArray);
    }

}