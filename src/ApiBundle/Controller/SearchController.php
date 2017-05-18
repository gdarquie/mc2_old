<?php

namespace ApiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class SearchController extends Controller
{
    /**
     * @Route("api/search")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
//        $numbers = $em->getRepository('AppBundle:Number')->findAll();
        $query = $em->createQuery("SELECT n FROM AppBundle:Number n");
//        $query->setMaxResults(1000);
        $numbers = $query->getResult();

        $query = $em->createQuery("SELECT DISTINCT(t.title) as title FROM AppBundle:Thesaurus t WHERE t.type = :source");
        $query->setParameter('source', 'source');
        $sources = $query->getResult();

        $query = $em->createQuery("SELECT DISTINCT(t.title) as title FROM AppBundle:Thesaurus t WHERE t.type = :performance");
        $query->setParameter('performance', 'performance');
        $performances = $query->getResult();

        return $this->render('ApiBundle:search:index.html.twig', array(
            'numbers' => $numbers,
            'sources' => $sources,
            'performances' => $performances
        ));

    }
}
