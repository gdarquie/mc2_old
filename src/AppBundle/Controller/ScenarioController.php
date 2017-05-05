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

            $sql3 = "SELECT n.title as title, p.name as name, COUNT(p.name) as nb FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.performers p WHERE t.title = :performance";

            for ($i=0;$i<$count;$i++)
            {
                $sql3 .= " AND n.source = :source".$i;
            }

            $sql3 .= " GROUP BY p.name ORDER BY nb DESC";

            $query = $em->createQuery($sql3);
            $query->setParameter('performance', $performance );

            for ($i=0;$i<$count;$i++)
            {
                $query->setParameter('source'.$i, $source[0]->getTitle() );
            }

            $performers = $query->getResult();

            //songs

            $sql4 = "SELECT s.title as title, COUNT(s.songId) as nb, s.songId as songId, n.performance as performance, n.source as source FROM AppBundle:Number n JOIN n.song s JOIN n.performance_thesaurus t  WHERE t.title = :performance";

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

        $query = "SELECT n.numberId as numberId, n.title as title, s.title as song, f.title as film FROM AppBundle:Number n JOIN n.song s JOIN n.film f JOIN n.performance_thesaurus t  WHERE t.title = :performance AND n.source = :source AND s.songId = :song";
        $query = $em->createQuery($query);
        $query->setParameter('performance', $performance );
        $query->setParameter('source', $source );
        $query->setParameter('song', $song );
        $numbers = $query->getResult();

        $query = "SELECT f.title as title, f.idImdb as imdb FROM AppBundle:Number n JOIN n.song s JOIN n.film f JOIN n.performance_thesaurus t  WHERE t.title = :performance AND n.source = :source AND s.songId = :song GROUP BY f.filmId";
        $query = $em->createQuery($query);
        $query->setParameter('performance', $performance );
        $query->setParameter('source', $source );
        $query->setParameter('song', $song );
        $films = $query->getResult();


        return $this->render('AppBundle:scenario:marion/song.html.twig', array(
            'numbers' => $numbers,
            'films' => $films
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

    /**
     * @Route("/scenario/person/{name}", name = "scenario_person")
     */
    public function mermanAction($name){

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT n FROM AppBundle:Number n JOIN n.performers p WHERE p.name = :person");
        $query->setParameter('person', $name );
        $numbers = $query->getResult();


        $query = $em->createQuery("SELECT COUNT(n) as nb, p.title FROM AppBundle:Number n JOIN n.performance_thesaurus p GROUP BY p.title ");
        $performances = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ");
        $query->setParameter('person', $name );
        $performance = $query->getResult();


        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.structure t JOIN n.performers p GROUP BY t.title");
        $structures = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.structure t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ");
        $query->setParameter('person', $name );
        $structure = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.genre t JOIN n.performers p GROUP BY t.title ORDER BY nb DESC");
        $genres = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.genre t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $name );
        $genre = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.source_thesaurus t JOIN n.performers p GROUP BY t.title ORDER BY nb DESC");
        $sources = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.source_thesaurus t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $name );
        $source = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.dancingType t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $name );
        $dancing = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.musical_thesaurus t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $name );
        $musical = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.completenessThesaurus t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $name );
        $completeness = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.completenessThesaurus t JOIN n.performers p WHERE p.name = :person");
        $query->setParameter('person', $name );
        $completes = $query->getSingleResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.completenessThesaurus t JOIN n.performers p WHERE p.name = :person AND t.title = :complete");
        $query->setParameter('person', $name );
        $query->setParameter('complete', 'complete' );
        $complete = $query->getSingleResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.completOptions t JOIN n.performers p WHERE p.name = :person AND t.title = :occurences");
        $query->setParameter('person', $name );
        $query->setParameter('occurences', 'multiple occurrences of a song or partial reprise' );
        $occurences = $query->getSingleResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.completOptions t JOIN n.performers p WHERE p.name = :person");
        $query->setParameter('person', $name );
        $completOptions = $query->getSingleResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.diegetic_thesaurus t JOIN n.performers p GROUP BY t.title ORDER BY nb DESC");
        $diegetics = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.diegetic_thesaurus t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $name );
        $diegetic = $query->getResult();


        $query = $em->createQuery("SELECT DISTINCT(f.filmId) as filmId FROM AppBundle:Number n JOIN n.film f JOIN n.performers p WHERE p.name = :person");
        $query->setParameter('person', $name );
        $filmsWithPerson = $query->getResult();
//        $filmsWithPerson = [4349,4606,4690,5030];

        //total des durées des numbers pour chaque film avec person (pourquoi HAVING marche pas)
        $query = $em->createQuery("SELECT SUM((n.endTc - n.beginTc)) as total, f.title as title FROM AppBundle:Film f JOIN f.numbers n WHERE f.filmId IN (:film) GROUP BY f.filmId ORDER BY f.title ASC");
//        $query->setParameter('person', $name );
        $query->setParameter('film', $filmsWithPerson );
        $lengthTotal = $query->getResult();

        $query = $em->createQuery("SELECT SUM((n.endTc - n.beginTc)) as total, f.title as title FROM AppBundle:Number n JOIN n.performers p JOIN n.film f WHERE p.name = :person  AND f.filmId IN (:film) GROUP BY f.filmId ORDER BY f.title ASC");
        $query->setParameter('person', $name );
        $query->setParameter('film', $filmsWithPerson );
        $lengthTotalForPerson = $query->getResult();

        if(count($lengthTotalForPerson) == count($lengthTotal)) {

            $ratio = [];
            for ($i = 0; $i < count($lengthTotalForPerson); $i++) {

                array_push($ratio, array("all" => $lengthTotal[$i]['total'], "title" => $lengthTotal[$i]['title'], "one" => $lengthTotalForPerson[$i]['total'] ));
            }
        }


        //sum of the presence time of the interpret on the scene

        //plusieurs ration:

        //faire un tableau avec toutes les données
        //chiffres + ratio de numbers où elle est/ number du film
        //chiffres + ratio de sum de la durée de tous les number d'une personne / sum de la durée des numbers du film
        //classement ensuite des ratio
        //moyenne globale de cette personne

        //une moyenne par films
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.diegetic_thesaurus t JOIN n.performers p WHERE p.name = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $name );
        $presence = $query->getResult();

        return $this->render('AppBundle:scenario:merman/index.html.twig', array(
            'numbers' => $numbers,
            'performances' => $performances,
            'performance' => $performance,
            'name' => $name,
            'structure' => $structure,
            'structures' => $structures,
            'genres' => $genres,
            'genre' => $genre,
            'source' => $source,
            'sources' => $sources,
            'dancing' => $dancing,
            'musical' => $musical,
            'completeness' => $completeness,
            'completes' => $completes,
            'complete' => $complete,
            'occurences' => $occurences,
            'completOptions' => $completOptions,
            'diegetic' => $diegetic,
            'diegetics' => $diegetics,
            'lengthTotal' => $lengthTotal,
            'filmsWithPerson' => $filmsWithPerson,
            'lengthTotalForPerson' =>$lengthTotalForPerson,
            'ratio' => $ratio
        ));

    }

}
