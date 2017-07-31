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

        $query = $em -> createQuery('SELECT s FROM AppBundle:Song s JOIN s.composer c');
        $listNumberComposers = $query->getResult();

        $query = $em -> createQuery('SELECT c.name as name, c.personId as id, count(s.songId) as nbSongs FROM AppBundle:Song s JOIN s.lyricist c GROUP BY name ORDER BY nbSongs desc ');
        $listLyricists = $query->getResult();

        $query = $em -> createQuery('SELECT s FROM AppBundle:Song s JOIN s.lyricist l');
        $listNumberLyricists = $query->getResult();

        $query = $em -> createQuery('SELECT c.name as name, c.personId as id, count(s.id) as nbSongs FROM AppBundle:Number s JOIN s.arrangers c GROUP BY name ORDER BY nbSongs desc ');
        $listArrangers = $query->getResult();

        $query = $em -> createQuery('SELECT n FROM AppBundle:Number n JOIN n.arrangers a');
        $listNumberArrangers = $query->getResult();

        $query = $em -> createQuery('SELECT m.title as title, m.thesaurusId as id, count(n.id) as nb FROM AppBundle:Number n JOIN n.musical_thesaurus m GROUP BY title ORDER BY nb desc ');
        $musicalStyle = $query->getResult();

        return $this->render('web/music/music.html.twig' , array(
            'listComposers' => $listComposers,
            'listNumberComposers' => $listNumberComposers,
            'listLyricists' => $listLyricists,
            'listNumberLyricists' => $listNumberLyricists,
            'listArrangers' => $listArrangers,
            'listNumberArrangers' => $listNumberArrangers,
            'musicalStyle' => $musicalStyle
        ));

    }

    /**
     * @Route("/music/musical_style/{musicalStyle}", name="getOneMusicalStyle")
     */
    public function getOneMusicalStyle($musicalStyle){

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT DISTINCT(d.title) as title, d.definition FROM AppBundle:Film f JOIN f.numbers n JOIN n.musical_thesaurus d WHERE d.thesaurusId = :musicalStyle');
        $query->setParameter('musicalStyle', $musicalStyle);
        $myMusicalStyle = $query->getSingleResult();

        $query = $em->createQuery('SELECT f.released as released, COUNT(d.title) as nb FROM AppBundle:Number n JOIN n.musical_thesaurus d JOIN n.film f WHERE d.thesaurusId = :musicalStyle GROUP BY f.released ');
        $query->setParameter('musicalStyle', $musicalStyle);
        $musicalStyleByYear = $query->getResult();

        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.musensemble s JOIN n.musical_thesaurus d WHERE d.thesaurusId = :musicalStyle GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('musicalStyle', $musicalStyle);
        $musicalEnsemble = $query->getResult();

        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb FROM AppBundle:Number n JOIN n.song a JOIN a.songtype s JOIN n.musical_thesaurus d WHERE d.thesaurusId = :musicalStyle GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('musicalStyle', $musicalStyle);
        $songTypes = $query->getResult();

        $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.musical_thesaurus d JOIN n.film f WHERE d.thesaurusId = :musicalStyle ORDER BY f.released ASC');
        $query->setParameter('musicalStyle', $musicalStyle);
        $numbersFinal = $query->getResult();


        return $this->render('web/music/oneMusicalStyle.html.twig', array(
            'myMusicalStyle' => $myMusicalStyle,
            'musicalStyleByYear' => $musicalStyleByYear,
            'musicalEnsemble' => $musicalEnsemble,
            'songTypes' => $songTypes,
            'numbersFinal' => $numbersFinal

        ));

    }
}
