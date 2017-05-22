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
        $query = $em->createQuery("SELECT n FROM AppBundle:Number n JOIN n.source_thesaurus t WHERE n.performance IS NOT NULL OR t.title IS NOT NULL");
//        $query->setMaxResults(100);
        $numbers = $query->getResult();

        $query = $em->createQuery("SELECT DISTINCT(t.title) as title FROM AppBundle:Thesaurus t WHERE t.type = :source");
        $query->setParameter('source', 'source');
        $sources = $query->getResult();

        $query = $em->createQuery("SELECT DISTINCT(t.title) as title FROM AppBundle:Thesaurus t WHERE t.type = :performance");
        $query->setParameter('performance', 'performance');
        $performances = $query->getResult();

//        $query = $em->createQuery("SELECT d.title as title FROM AppBundle:Number n JOIN n.source_thesaurus t JOIN n.dancemble d WHERE n.performance IS NOT NULL OR t.title IS NOT NULL");
//        $query->setParameter('performance', 'performance');
//        $dancemble = $query->getResult();

//        //Dancing ensemble, Dancing type, Dance subgenre, Dance content
////        $dancingType $dancemble
//
//        $query = $em->createQuery();
//        $query->setParameter('');

        return $this->render('ApiBundle:search:index.html.twig', array(
            'numbers' => $numbers,
            'sources' => $sources,
            'performances' => $performances
        ));

    }
}
