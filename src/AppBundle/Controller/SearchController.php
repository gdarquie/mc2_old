<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\SearchType;

/**
 * @Route("/search")
 */
class SearchController extends Controller
{
    /**
     * @Route("/", name="search")
     */
    public function indexAction(Request $request)
    {
        $numbers = "";
        $choreographers ="";
        $performers ="";

        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted()) {

            $number = $form->getData();
            $source = $number->getSourceThesaurus();
            $performance = $number->getPerformanceThesaurus();

            if ($performance != null){
                $performance = $number->getPerformanceThesaurus()->getTitle();
            }

            //compter le nombre de sources
            $count = count($source);

            $sql = "SELECT n.title as title, c.name as name FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.choregraphers c WHERE t.title = :performance ORDER BY n.title ASC";

            for ($i=0;$i<$count;$i++)
            {
                $sql .= " AND n.source = :source".$i;
            }

            $query = $em->createQuery($sql);
            $query->setParameter('performance', $performance );

            for ($i=0;$i<$count;$i++)
            {
                $query->setParameter('source'.$i, $source[0]->getTitle() );
            }

//            dump($query);die();
//            $query->setParameter('filmId', $filmId );
            $numbers = $query->getResult();


            //choregraphers

            $sql2 = "SELECT n.title as title, c.name as name, COUNT(c.name) as nb FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.choregraphers c WHERE t.title = :performance GROUP BY c.name ORDER BY nb DESC";

            $query = $em->createQuery($sql2);
            $query->setParameter('performance', $performance );

            for ($i=0;$i<$count;$i++)
            {
                $query->setParameter('source'.$i, $source[0]->getTitle() );
            }

            $choreographers = $query->getResult();

            //performers
            $performers = $query->getResult();

            $sql3 = "SELECT n.title as title, c.name as name, COUNT(c.name) as nb FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.performers c WHERE t.title = :performance GROUP BY c.name ORDER BY nb DESC";

            $query = $em->createQuery($sql3);
            $query->setParameter('performance', $performance );

            for ($i=0;$i<$count;$i++)
            {
                $query->setParameter('source'.$i, $source[0]->getTitle() );
            }

            $performers = $query->getResult();

//            dump($numbers);die();

        }

        //version export JSON

        return $this->render('AppBundle:search:search.html.twig', array(
            'form' => $form->createView(),
            'choreographers' => $choreographers,
            'performers' => $performers,
            'numbers' => $numbers
        ));
    }



    /**
     * @Route("/number", name="search_number")
     */
    public function searchNumberAction(){

        if ($form->isSubmitted()){

        }

        return $this->render('web/search/index.html.twig');

    }
}
