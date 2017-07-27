<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MusicController extends Controller
{

    /**
     * @Route("/music", name="getMusic")
     */
    public function getDancing(){

        $em = $this -> getDoctrine()->getManager();

        $query = $em -> createQuery('SELECT c.name as name, c.personId as id, count(s.songId) as nbSongs FROM AppBundle:Song s JOIN s.composer c GROUP BY name ORDER BY nbSongs desc ');
        $listComposers = $query->getResult();

        $query = $em -> createQuery('SELECT c.name as name, c.personId as id, count(s.songId) as nbSongs FROM AppBundle:Song s JOIN s.lyricist c GROUP BY name ORDER BY nbSongs desc ');
        $listLyricists = $query->getResult();

        $query = $em -> createQuery('SELECT c.name as name, c.personId as id, count(s.id) as nbSongs FROM AppBundle:Number s JOIN s.arrangers c GROUP BY name ORDER BY nbSongs desc ');
        $listArrangers = $query->getResult();

        $query = $em -> createQuery('SELECT m.title as title, count(n.id) as nb FROM AppBundle:Number n JOIN n.musical_thesaurus m GROUP BY title ORDER BY nb desc ');
        $musicalStyle = $query->getResult();

        return $this->render('web/music/music.html.twig' , array(
            'listComposers' => $listComposers,
            'listLyricists' => $listLyricists,
            'listArrangers' => $listArrangers,
            'musicalStyle' => $musicalStyle
        ));

    }
}
