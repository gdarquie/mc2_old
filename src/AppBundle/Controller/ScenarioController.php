<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\SearchType;

class ScenarioController extends Controller
{

    //For Marion Presentation in MAMI 2017
    /**
     * @Route("scenario/marion/intro", name = "marion_intro")
     */
    public function musicAction(){

        $em = $this->getDoctrine()->getManager();

        //All songs
        $query = $em->createQuery("SELECT s.title as title, s.date as date, s.songId as songId, COUNT(n.id) as nb,COUNT(DIStiNCT(f.filmId)) as nbFilms FROM AppBundle:Song s JOIN s.number n JOIN n.film f GROUP BY s.songId ORDER BY nb DESC");
//        $query->setParameter('person', $name );
        $songs = $query->getResult();


        $query = $em->createQuery("SELECT COUNT(DISTINCT(n.id)) as nbNumber, COUNT(DISTINCT(f.filmId)) as nbFilm FROM AppBundle:number n JOIN n.film as f");
//        $query->setParameter('person', $name );
        $global = $query->getSingleResult();

        $query = $em->createQuery("SELECT s.title as title, s.date as date, s.songId as songId, COUNT(n.id) as nb,COUNT(DIStiNCT(f.filmId)) as nbFilms FROM AppBundle:Song s JOIN s.number n JOIN n.film f GROUP BY s.songId ORDER BY nb DESC");
//        $query->setParameter('person', $name );
        $songs = $query->getResult();

        $min = 2;

//        List of songId used by at least $max_number numbers
        $query = $em->createQuery("SELECT s.songId as songId FROM AppBundle:Song s JOIN s.number n GROUP BY s.songId HAVING COUNT(n.id)  >= :min ");
        $query->setParameter('min', $min );
        $songWithMultipleNumbers = $query->getResult();

//        List of songId used by at least $min distinct films
        $query = $em->createQuery("SELECT s.songId as songId FROM AppBundle:Song s JOIN s.number n JOIN n.film f GROUP BY s.songId HAVING COUNT(DISTINCT(f.filmId))  >= :min ");
        $query->setParameter('min', $min );
        $songIdWithMultipleFilms = $query->getResult();

        $query = $em->createQuery("SELECT s.songId as songId, s.title as title, f.title as film, n.title as number, COUNT(DISTINCT(f.filmId)) as nbFilm, COUNT(DISTINCT(n.id)) as nbNumber FROM AppBundle:Song s JOIN s.number n JOIN n.film f GROUP BY s.songId HAVING COUNT(DISTINCT(f.filmId))  >= :min ");
        $query->setParameter('min', $min );
        $songWithMultipleFilms = $query->getResult();

        //List of all films with the songs used in two different films [not used by Marion]
        $query = $em->createQuery("SELECT DISTINCT(f.filmId) FROM AppBundle:Number n JOIN n.film f JOIN n.song s WHERE s.songId IN(:songs)");
        $query->setParameter('songs', $songIdWithMultipleFilms );
        $listFilmsWith2Songs = $query->getResult();

        //Titles of all films with the songs used in two different films [not used by Marion, check with her]
        $query = $em->createQuery("SELECT f.title as title, f.filmId as filmId FROM AppBundle:Number n JOIN n.film f JOIN n.song s WHERE s.songId IN(:songs) GROUP BY f.filmId");
        $query->setParameter('songs', $songIdWithMultipleFilms );
        $titlesFilmsWith2Songs = $query->getResult();

        //Films with popular songs with performance_thesaurus = "intrumental+dance" OR 186
        $query = $em->createQuery("SELECT f.filmId as filmId, f.title as title, COUNT(DISTINCT(n.id)) as nbNumber, COUNT(DISTINCT(f.filmId)) as nbFilm FROM AppBundle:Number n JOIN n.film f JOIN n.song s  WHERE (s.songId IN(:songs) AND (n.performance_thesaurus = :perf1 OR n.performance_thesaurus = :perf2)) GROUP BY f.filmId");
        $query->setParameter('songs', $songIdWithMultipleFilms );
        $query->setParameter('perf1', 183 );
        $query->setParameter('perf2', 186 );
        $listeFilmsWith2SongsAndDance = $query->getResult();

        //Dance films
        $query = $em->createQuery("SELECT DISTINCT(f.filmId) as filmId FROM AppBundle:Number n JOIN n.film f JOIN n.song s WHERE n.performance_thesaurus = :perf1 OR n.performance_thesaurus = :perf2");
        $query->setParameter('perf1', 183 );
        $query->setParameter('perf2', 186 );
        $danceFilms = $query->getResult();

        //Dance number
        $query = $em->createQuery("SELECT DISTINCT(n.id) as id FROM AppBundle:Number n WHERE n.performance_thesaurus = :perf1 OR n.performance_thesaurus = :perf2");
        $query->setParameter('perf1', 183 );
        $query->setParameter('perf2', 186 );
        $danceNumbers = $query->getResult();

        //List of songs of Films with songs connected to 2 or more films with performance_thesaurus = "intrumental+dance" OR 186
        $query = $em->createQuery("SELECT s.songId as songId, s.title as title, COUNT(DISTINCT(n.id)) as nbNumber, COUNT(DISTINCT(f.filmId)) as nbFilm FROM AppBundle:Number n JOIN n.film f JOIN n.song s  WHERE (s.songId IN(:songs) AND (n.performance_thesaurus = :perf1 OR n.performance_thesaurus = :perf2)) GROUP BY s.songId");
        $query->setParameter('songs', $songIdWithMultipleFilms );
        $query->setParameter('perf1', 183 );
        $query->setParameter('perf2', 186 );
        $listeSongsWithFilms2SongsAndDance = $query->getResult();

        //Numbers of Films with songs connected to 2 or more film with performance_thesaurus = "intrumental+dance" OR 186 (not used here)
        $query = $em->createQuery("SELECT n.id as id FROM AppBundle:Number n JOIN n.film f JOIN n.song s  WHERE (s.songId IN(:songs) AND (n.performance_thesaurus = :perf1 OR n.performance_thesaurus = :perf2)) GROUP BY n.id");
        $query->setParameter('songs', $songIdWithMultipleFilms );
        $query->setParameter('perf1', 183 );
        $query->setParameter('perf2', 186 );
        $listeNumbersWith2SongsAndDance = $query->getResult();


        //Visualisations
        //Tous les numbers contenant dance et avec une song in at least 2 films

        //Liste de tous les films qui contiennent qui ne contiennent pas de danse (à l'échelle des numbers) par rapport à l'ensemble des dancing type

        return $this->render('AppBundle:scenario:marion/intro.html.twig', array(
            'songs' => $songs,
            'global' => $global,
            'songWithMultipleNumbers' => $songWithMultipleNumbers,
            'songWithMultipleFilms' => $songWithMultipleFilms,
            'titlesFilmsWith2Songs' => $titlesFilmsWith2Songs,
            'listFilmsWith2Songs' => $listFilmsWith2Songs,
            'titlesFilmsWith2Songs' => $titlesFilmsWith2Songs,
            'listeFilmsWith2SongsAndDance' => $listeFilmsWith2SongsAndDance,
            'songIdWithMultipleFilms' => $songIdWithMultipleFilms,
            'danceFilms' => $danceFilms,
            'danceNumbers' => $danceNumbers,
            'listeSongsWithFilms2SongsAndDance' => $listeSongsWithFilms2SongsAndDance,
            'min' => $min
        ));
    }

    //For Marion Presentation in MAMI 2017
    /**
     * @Route("/scenario/marion/results", name = "marion_results")
     */
    public function musicResultAction(){

        $em = $this->getDoctrine()->getManager();

        $min = 2;

//        List of songId used by at least $min distinct films
        $query = $em->createQuery("SELECT s.songId as songId FROM AppBundle:Song s JOIN s.number n JOIN n.film f GROUP BY s.songId HAVING COUNT(DISTINCT(f.filmId))  >= :min ");
        $query->setParameter('min', $min );
        $songIdWithMultipleFilms = $query->getResult();


        $query = $em->createQuery("SELECT n.id as id FROM AppBundle:Number n JOIN n.film f JOIN n.song s  WHERE (s.songId IN(:songs) AND (n.performance_thesaurus = :perf1 OR n.performance_thesaurus = :perf2)) GROUP BY n.id");
        $query->setParameter('songs', $songIdWithMultipleFilms );
        $query->setParameter('perf1', 183 );
        $query->setParameter('perf2', 186 );
        $listeFilmsWith2SongsAndDance = $query->getResult();


        return $this->render('AppBundle:scenario:marion/results.html.twig', array(
            'listeFilmsWith2SongsAndDance' => $listeFilmsWith2SongsAndDance,
        ));

    }

}
