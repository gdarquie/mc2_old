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

        $query = $em->createQuery("SELECT s.title as title, s.date as date, s.songId as songId, COUNT(n.numberId) as nb FROM AppBundle:Song s LEFT JOIN s.number n GROUP BY s.songId ORDER BY nb DESC");
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


        return $this->render('web/song/song.html.twig',array(
            'song' => $song
        ));
    }



}
