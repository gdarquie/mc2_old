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

        $query = $em->createQuery("SELECT s.title as title, s.date as date, s.songId as songId, COUNT(n.numberId) as nb,COUNT(DIStiNCT(f.filmId)) as nbFilms FROM AppBundle:Song s LEFT JOIN s.number n JOIN n.film f GROUP BY s.songId ORDER BY nb DESC");
//        $query->setParameter('person', $name );
        $songs = $query->getResult();

        return $this->render('AppBundle:song:index.html.twig',array(
            'songs' => $songs
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
