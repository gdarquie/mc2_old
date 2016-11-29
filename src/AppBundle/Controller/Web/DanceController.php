<?php

namespace AppBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DanceController extends Controller
{

    /**
     * @Route("/dance", name="getDancing")
     */
    public function getDancing(){

        $em = $this -> getDoctrine()->getManager();

        //all dancing
        $query = $em -> createQuery('SELECT d FROM AppBundle:Thesaurus d WHERE d.type = :type AND d.category = :category');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dancing type');
        $dancing = $query->getResult();

        //all sub-genre
        $query = $em -> createQuery('SELECT d FROM AppBundle:Thesaurus d WHERE d.type = :type AND d.category = :category');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dance sub-genre');
        $subgenre = $query->getResult();

        //all sub-genre
        $query = $em -> createQuery('SELECT d FROM AppBundle:Thesaurus d WHERE d.type = :type AND d.category = :category');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dance content');
        $content = $query->getResult();

        //top dancing
        $query = $em -> createQuery('SELECT t.title as title, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.dancingType t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dancing type');
        $populardancing = $query->getResult();

        //top subgenre
        $query = $em -> createQuery('SELECT t.title as title, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.danceSubgenre t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dance sub-genre');
        $popularsubgenre = $query->getResult();

        //top content
        $query = $em -> createQuery('SELECT t.title as title, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.danceContent t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dance content');
        $popularcontent = $query->getResult();

        //number of danced numbers
        $query = $em -> createQuery('SELECT COUNT(t.thesaurusId) as nb FROM AppBundle:Number n JOIN n.dancingType t WHERE t.type = :type AND t.category = :category AND t.title != :na');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dancing type');
        $query->setParameter('na', 'NA');
        $numberDancedNumber = $query->getSingleResult();

        //number of danced numbers
        $query = $em -> createQuery('SELECT COUNT(DISTINCT(f.filmId)) as nb FROM AppBundle:Number n JOIN n.dancingType t JOIN n.film f WHERE t.type = :type AND t.category = :category AND t.title != :na');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dancing type');
        $query->setParameter('na', 'NA');
        $nbfilmsWithDancedNumber = $query->getSingleResult();

        //number of danced numbers (other technic to count)
        $query = $em -> createQuery('SELECT COUNT(n.numberId) as nb FROM AppBundle:Number n WHERE n.performance = :instru OR n.performance = :song ');
        $query->setParameter('instru', 'instrumental+dance');
        $query->setParameter('song', 'song+dance');
        $numberDancedNumber2 = $query->getSingleResult();

        //average number of shots by year
        $query = $em -> createQuery('SELECT AVG((n.length)/n.shots) as nb, f.released as released FROM AppBundle:Number n JOIN n.film f WHERE n.shots > 0 GROUP BY f.released');
//        $query->setParameter('instru', 'instrumental+dance');
//        $query->setParameter('song', 'song+dance');
        $avgNbShots = $query->getResult();

//        //average number of shots by year for danced number
//        $query = $em -> createQuery('SELECT AVG(n.shots) as nb, f.released as released FROM AppBundle:Number n JOIN f.film f GROUP BY f.released ');
////        $query->setParameter('instru', 'instrumental+dance');
////        $query->setParameter('song', 'song+dance');
//        $avgNbShots = $query->getSingleResult();

        return $this->render('web/dance/index.html.twig' , array(
            'dancing' => $dancing,
            'subgenre' => $subgenre,
            'content' => $content,
            'populardancing' => $populardancing,
            'popularsubgenre' => $popularsubgenre,
            'popularcontent' => $popularcontent,
            'numberDancedNumber' => $numberDancedNumber,
            'nbfilmsWithDancedNumber' => $nbfilmsWithDancedNumber,
            'numberDancedNumber2' => $numberDancedNumber2,
            'avgNbShots' => $avgNbShots
        ));

    }

    /**
     * @Route("/dance/dancing-type/{dance}", name="getOneDancingType")
     */
    public function getOneDancing($dance){

        $em = $this->getDoctrine()->getManager();

        //filmsByDance
        $query = $em -> createQuery('SELECT DISTINCT(f.title) as title, f.filmId as filmId, f.idImdb as imdb FROM AppBundle:Film f JOIN f.numbers n JOIN n.dancingType d WHERE d.thesaurusId = :dance');
        $query->setParameter('dance', $dance);
        $filmsByDance = $query->getResult();

        //myDance
        $query = $em->createQuery('SELECT DISTINCT(d.title) as title FROM AppBundle:Film f JOIN f.numbers n JOIN n.dancingType d WHERE d.thesaurusId = :dance');
        $query->setParameter('dance', $dance);
        $myDance = $query->getSingleResult();

        //Genres
        $query = $em->createQuery('SELECT g.title as title, COUNT(f.filmId) as nb FROM AppBundle:Number n JOIN n.film f JOIN n.genre g JOIN n.dancingType d WHERE d.thesaurusId = :dance GROUP BY g.thesaurusId ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $genres = $query->getResult();


        //DancingTypeByYear

        $query = $em->createQuery('SELECT f.released as released, COUNT(d.title) as nb FROM AppBundle:Number n JOIN n.dancingType d JOIN n.film f WHERE d.thesaurusId = :dance GROUP BY f.released ');
        $query->setParameter('dance', $dance);
        $dancingTypeByYear = $query->getResult();

        return $this->render('web/dance/dancingType.html.twig', array(
            'filmsByDance' => $filmsByDance,
            'myDance' => $myDance,
            'genres' => $genres,
            'dancingTypeByYear' => $dancingTypeByYear
        ));

    }

    /**
     * @Route("/dance/dance-content/{dance}", name="getOneDanceContent")
     */
    public function getOneDanceContent($dance){

        $em = $this->getDoctrine()->getManager();

        //filmsByDance
        $query = $em -> createQuery('SELECT DISTINCT(f.title) as title, f.filmId as filmId, f.idImdb as imdb FROM AppBundle:Film f JOIN f.numbers n JOIN n.danceContent d WHERE d.thesaurusId = :dance');
        $query->setParameter('dance', $dance);
        $filmsByDance = $query->getResult();

        //myDance
        $query = $em->createQuery('SELECT DISTINCT(d.title) as title FROM AppBundle:Film f JOIN f.numbers n JOIN n.danceContent d WHERE d.thesaurusId = :dance');
        $query->setParameter('dance', $dance);
        $myDance = $query->getSingleResult();

        //Genres
        $query = $em->createQuery('SELECT g.title as title, COUNT(f.filmId) as nb FROM AppBundle:Number n JOIN n.film f JOIN n.genre g JOIN n.danceContent d WHERE d.thesaurusId = :dance GROUP BY g.thesaurusId ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $genres = $query->getResult();


        //DancingTypeByYear
        $query = $em->createQuery('SELECT f.released as released, COUNT(d.title) as nb FROM AppBundle:Number n JOIN n.danceContent d JOIN n.film f WHERE d.thesaurusId = :dance GROUP BY f.released ');
        $query->setParameter('dance', $dance);
        $danceContentByYear = $query->getResult();


        return $this->render('web/dance/danceContent.html.twig', array(
            'filmsByDance' => $filmsByDance,
            'myDance' => $myDance,
            'genres' => $genres,
            'danceContentByYear' => $danceContentByYear

        ));
    }

    /**
     * @Route("/dance/dance-subgenre/{dance}", name="getOneDanceSubgenre")
     */
    public function getOneDanceSubgenre($dance){

        $em = $this->getDoctrine()->getManager();

        //filmsByDance
        $query = $em -> createQuery('SELECT DISTINCT(f.title) as title, f.filmId as filmId, f.idImdb as imdb FROM AppBundle:Film f JOIN f.numbers n JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance');
        $query->setParameter('dance', $dance);
        $filmsByDance = $query->getResult();

        //myDance
        $query = $em->createQuery('SELECT DISTINCT(d.title) as title FROM AppBundle:Film f JOIN f.numbers n JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance');
        $query->setParameter('dance', $dance);
        $myDance = $query->getSingleResult();

        //Genres
        $query = $em->createQuery('SELECT g.title as title, COUNT(f.filmId) as nb FROM AppBundle:Number n JOIN n.film f JOIN n.genre g JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance GROUP BY g.thesaurusId ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $genres = $query->getResult();

        //DancingTypeByYear
        $query = $em->createQuery('SELECT f.released as released, COUNT(d.title) as nb FROM AppBundle:Number n JOIN n.danceSubgenre d JOIN n.film f WHERE d.thesaurusId = :dance GROUP BY f.released ');
        $query->setParameter('dance', $dance);
        $danceSubgenreByYear = $query->getResult();

        //contents
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.danceContent s JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $contents = $query->getResult();

        return $this->render('web/dance/danceSubgenre.html.twig', array(
            'filmsByDance' => $filmsByDance,
            'myDance' => $myDance,
            'genres' => $genres,
            'danceSubgenreByYear' => $danceSubgenreByYear,
            'contents' => $contents

        ));

    }
}
