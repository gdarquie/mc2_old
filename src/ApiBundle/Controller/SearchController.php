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


        return $this->render('ApiBundle:search:index.html.twig', array(
            'numbers' => $numbers,
            'sources' => $sources,
            'performances' => $performances
        ));

    }

    /**
     * @Route("api/search/dance/type={type}/category={category}/title={title}")
     */
    public function danceAction($type,$title,$category){

        $em = $this->getDoctrine()->getManager();

        //Tests
//        $type = "Dance";
//        $title = "tap dance";
//        $category = "Dancing type";
        //end test


//        $query = $em->createQuery("SELECT t.title as title, COUNT(t.thesaurusId) as nb, SUM(t.thesaurusId) as total FROM AppBundle:Number n JOIN n.dancingType t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ");
//        $query->setParameter('type', $type);
//        $query->setParameter('category', $category);
//        $dancingtypes = $query->getResult();

//        dump($dancingtypes);die;

        if ($type == "Dance"){
            if($category == 'Dancing type'){
                $query = $em->createQuery("SELECT COUNT(n.numberId) as nb FROM AppBundle:Number n JOIN n.dancingType t WHERE t.type = :type AND t.title = :title AND t.category = :category");
            }
            else if($category == 'Dance sub-genre'){
                $query = $em->createQuery("SELECT COUNT(n.numberId) as nb FROM AppBundle:Number n JOIN n.danceSubgenre t WHERE t.type = :type AND t.title = :title AND t.category = :category");
            }
            else if($category == 'Dance content') {
                $query = $em->createQuery("SELECT COUNT(n.numberId) as nb FROM AppBundle:Number n JOIN n.danceContent t WHERE t.type = :type AND t.title = :title AND t.category = :category");
            }
        }
        else if($type == 'dancEmble')
            $query = $em->createQuery("SELECT COUNT(n.numberId) as nb FROM AppBundle:Number n JOIN n.dancemble t WHERE t.type = :type AND t.title = :title AND t.category = :category");

        $query->setParameter('type', $type);
        $query->setParameter('title', $title);
        $query->setParameter('category', $category);
        $dances = $query->getResult();

        $response = new JsonResponse($dances, 200);

        return $response;

    }
}
