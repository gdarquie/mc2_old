<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\SearchType;

class ScenarioController extends Controller
{

    //Scénarion de Marion
    /**
     * @Route("scenario/marion", name="scenario_marion")
     */
    public function marionAction(Request $request)
    {
        $numbers = "";
        $choreographers ="";
        $performers ="";
        $songs= "";
        $title = "";

        $form = $this->createForm(SearchType::class);

//        $number = $form->getData();
//        $number = $number->setTitle($title);

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

            $sql = "SELECT n.title as title, c.name as name FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.choregraphers c WHERE t.title = :performance";

            for ($i=0;$i<$count;$i++)
            {
                $sql .= " AND n.source = :source".$i;
            }

            $sql .= " ORDER BY n.title ASC";

            $query = $em->createQuery($sql);
            $query->setParameter('performance', $performance );

            for ($i=0;$i<$count;$i++)
            {
                $query->setParameter('source'.$i, $source[0]->getTitle() );
            }

            $numbers = $query->getResult();


            //choregraphers

            $sql2 = "SELECT n.title as title, c.name as name, COUNT(c.name) as nb FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.choregraphers c WHERE t.title = :performance";

            for ($i=0;$i<$count;$i++)
            {
                $sql2 .= " AND n.source = :source".$i;
            }

            $sql2 .= " GROUP BY c.name ORDER BY nb DESC";

            $query = $em->createQuery($sql2);
            $query->setParameter('performance', $performance );

            for ($i=0;$i<$count;$i++)
            {
                $query->setParameter('source'.$i, $source[0]->getTitle() );
            }

            $choreographers = $query->getResult();

            //performers

            $sql3 = "SELECT n.title as title, c.name as name, COUNT(c.name) as nb FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.performers c WHERE t.title = :performance";

            for ($i=0;$i<$count;$i++)
            {
                $sql3 .= " AND n.source = :source".$i;
            }

            $sql3 .= " GROUP BY c.name ORDER BY nb DESC";

            $query = $em->createQuery($sql3);
            $query->setParameter('performance', $performance );

            for ($i=0;$i<$count;$i++)
            {
                $query->setParameter('source'.$i, $source[0]->getTitle() );
            }

            $performers = $query->getResult();

            //songs

            $sql4 = "SELECT s.title as title, COUNT(s.songId) as nb, n.performance as performance, n.source as source FROM AppBundle:Number n JOIN n.song s JOIN n.performance_thesaurus t  WHERE t.title = :performance";

            for ($i=0;$i<$count;$i++)
            {
                $sql4 .= " AND n.source = :source".$i;
            }

            $sql4 .= " GROUP BY s.songId ORDER BY nb DESC";

            $query = $em->createQuery($sql4);
            $query->setParameter('performance', $performance );

            for ($i=0;$i<$count;$i++)
            {
                $query->setParameter('source'.$i, $source[0]->getTitle() );
            }
            $songs = $query->getResult();

        }

        //version export JSON

        return $this->render('AppBundle:scenario:marion/index.html.twig', array(
            'form' => $form->createView(),
            'choreographers' => $choreographers,
            'performers' => $performers,
            'numbers' => $numbers,
            'songs' => $songs
        ));
    }


    //Liste of numbers for a song with source and performance filters
    /**
     * @Route("scenario/dance/performance={performance}&source={source}&song={song}", name="scenario_marion_song")
     */
    public function dancesongAction($performance,$source, $song){

        $em = $this->getDoctrine()->getManager();

        $query = "SELECT n.title as title, s.title as song, COUNT(s.songId) as nb FROM AppBundle:Number n JOIN n.song s JOIN n.performance_thesaurus t  WHERE t.title = :performance AND n.source = :source AND s.title = :song";
        $query = $em->createQuery($query);
        $query->setParameter('performance', $performance );
        $query->setParameter('source', $source );
        $query->setParameter('song', $song );
        $numbers = $query->getResult();


        return $this->render('AppBundle:scenario:marion/song.html.twig', array(
            'numbers' => $numbers
        ));
    }

    /**
     * @Route("/scenario/marguerite", name = "scenario_marguerite")
     */
    public function margueriteAction(){

        $em = $this->getDoctrine()->getManager();

        $param1 = "solo(s)";
        $param2 = "solo(s)";

        $query = $em->createQuery("SELECT n FROM AppBundle:Number n JOIN n.performers p JOIN n.musensemble m JOIN n.dancemble d WHERE m.title = :musensemble AND d.title = :dancemble");
        $query->setParameters(array('musensemble' => $param1 , 'dancemble' => $param2));
        $numbers = $query->getResult();

        $query = $em->createQuery("SELECT p.name as name, COUNT(p.name) as nb FROM AppBundle:Number n JOIN n.performers p JOIN n.musensemble m JOIN n.dancemble d WHERE m.title = :musensemble AND d.title = :dancemble GROUP BY p.name ORDER BY nb DESC");
        $query->setParameters(array('musensemble' => $param1 , 'dancemble' => $param2));
        $performers = $query->getResult();


        return $this->render('AppBundle:scenario:marguerite/index.html.twig', array(
            'numbers' => $numbers,
            'performers' => $performers
        ));

    }
}
