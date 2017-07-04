<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Number;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ElasticaController extends Controller
{
    /**
     * @Route("/elastica", name="elastica")
     */
    public function indexAction()
    {

        $finder = $this->container->get('fos_elastica.finder.mc2.number');
        $results = $finder->find('overture');


        return $this->render('AppBundle:elastica:index.html.twig', array(
            'results'=> $results
        ));
    }

    /**
     * @Route("/elastica/search/{search}", name="elastica_search")
     */
    public function searchAction($search)
    {

        $finder = $this->container->get('fos_elastica.finder.mc2.number');
        $results = $finder->find($search);

//        dump($results);die;

        $data = array('number' => array());

        foreach ($results as $number) {
            $data['number'][] = $this->serializeNumber($number);
        }

        $response = new JsonResponse($data, 200);
        return $response;

    }

    private function serializeNumber(Number $number)
    {
        return array(
            'id' => $number->getId(),
            'title' => $number->getTitle(),
            'film' => $number->getFilm()->getTitle(),
            'released' =>$number->getFilm()->getReleased(),
//            'songTitle' => $number->getSong()
        );
    }
}
