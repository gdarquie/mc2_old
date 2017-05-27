<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SongController extends Controller
{
    /**
     * @Route("/songs", name = "songs")
     */
    public function showAllAction(){

        $em = $this->getDoctrine()->getManager();

        //All songs
        $query = $em->createQuery("SELECT s.title as title, s.date as date, s.songId as songId, COUNT(n.numberId) as nb,COUNT(DIStiNCT(f.filmId)) as nbFilms FROM AppBundle:Song s LEFT JOIN s.number n JOIN n.film f GROUP BY s.songId ORDER BY nb DESC");
//        $query->setParameter('person', $name );
        $songs = $query->getResult();

        $min = 2;

//        List of songId used by at least $max_number numbers
        $query = $em->createQuery("SELECT s.songId as songId FROM AppBundle:Song s JOIN s.number n GROUP BY s.songId HAVING COUNT(n.numberId)  >= :min ");
        $query->setParameter('min', $min );
        $songWithMultipleNumbers = $query->getResult();

//        List of songId used by at least $min distinct films
        $query = $em->createQuery("SELECT s.songId as songId FROM AppBundle:Song s JOIN s.number n JOIN n.film f GROUP BY s.songId HAVING COUNT(DISTINCT(f.filmId))  >= :min ");
        $query->setParameter('min', $min );
        $songWithMultipleFilms = $query->getResult();

        //List of all films with the songs used in two different films [not used by Marion]
        $query = $em->createQuery("SELECT f.filmId FROM AppBundle:Number n JOIN n.film f JOIN n.song s WHERE s.songId IN(:songs)");
        $query->setParameter('songs', $songWithMultipleFilms );
        $listFilmsWith2Songs = $query->getResult();

        //Titles of all films with the songs used in two different films [not used by Marion, check with her]
        $query = $em->createQuery("SELECT f.title FROM AppBundle:Number n JOIN n.film f JOIN n.song s WHERE s.songId IN(:songs)");
        $query->setParameter('songs', $songWithMultipleFilms );
        $titlesFilmsWith2Songs = $query->getResult();

        //Films with popular songs with performance_thesaurus = "intrumental+dance" OR 186
        $query = $em->createQuery("SELECT DISTINCT(f.filmId) as filmId FROM AppBundle:Number n JOIN n.film f JOIN n.song s WHERE s.songId IN(:songs) AND (n.performance_thesaurus = :perf1 OR n.performance_thesaurus = :perf2)");
        $query->setParameter('songs', $songWithMultipleFilms );
        $query->setParameter('perf1', "intrumental+dance" );
        $query->setParameter('perf2', 186 );
        $titlesFilmsWith2Songs = $query->getResult();

        return $this->render('AppBundle:song:index.html.twig',array(
            'songs' => $songs,
            'songWithMultipleNumbers' => $songWithMultipleNumbers,
            'songWithMultipleFilms' => $songWithMultipleFilms,
            'listFilmsWith2Songs' => $listFilmsWith2Songs,
            'titlesFilmsWith2Songs' => $titlesFilmsWith2Songs,
            'min' => $min
        ));
    }


    /**
     * @Route("song/id/{songId}", name="song")
     */
    public function songAction($songId){

        $em = $this->getDoctrine()->getManager();
        $song = $em->getRepository('AppBundle:Song')->findOneBySongId($songId);

        $query = $em->createQuery("SELECT DISTINCT(f.title) as title, f.filmId as filmId, f.idImdb as imdb FROM AppBundle:Song s LEFT JOIN s.number n JOIN n.film f WHERE s.songId = :songId");
        $query->setParameter('songId', $songId );
        $films = $query->getResult();


        return $this->render('AppBundle:song:song.html.twig',array(
            'song' => $song,
            'films' => $films
        ));
    }



}
