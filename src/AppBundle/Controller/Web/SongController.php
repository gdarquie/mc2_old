<?php

namespace AppBundle\Controller\Web;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SongController extends Controller
{
    /**
     * @Route("/songs", name = "songs")
     */
    public function showAllAction(){

        $em = $this->getDoctrine()->getManager();
        $songs = $em->getRepository('AppBundle:Song')->findAll();


        return $this->render('web/song/index.html.twig',array(
            'songs' => $songs
        ));
    }

    /**
     * @Route("song/id/{songId}", name="song")
     */
    public function filmAction($songId){

        $em = $this->getDoctrine()->getManager();
        $song = $em->getRepository('AppBundle:Song')->findOneBySongId($songId);


        return $this->render('web/song/song.html.twig',array(
            'song' => $song
        ));
    }



}
