<?php

namespace AppBundle\Controller;

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
        $query = $em -> createQuery('SELECT t.title as title, t.thesaurusId as thesaurusId, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.dancingType t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dancing type');
        $populardancing = $query->getResult();

        //top subgenre
        $query = $em -> createQuery('SELECT t.title as title, t.thesaurusId as thesaurusId, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.danceSubgenre t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC');
        $query->setParameter('type', 'dance');
        $query->setParameter('category', 'Dance sub-genre');
        $popularsubgenre = $query->getResult();

        //top content
        $query = $em -> createQuery('SELECT t.title as title, t.thesaurusId as thesaurusId, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.danceContent t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC');
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
        $query = $em -> createQuery('SELECT AVG((n.length)/n.shots) as nb, f.released as released FROM AppBundle:Number n JOIN n.film f WHERE n.shots > 0 AND f.released > 0 GROUP BY f.released');
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

        //numbers
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.dancingType d JOIN n.film f WHERE d.thesaurusId = :dance ORDER BY f.released ASC');
        $query->setParameter('dance', $dance);
        $numbers = $query->getResult();

        //ensembles
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.dancemble s JOIN n.dancingType d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $dancembles = $query->getResult();

        //exoticisms
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.exoticism_thesaurus s JOIN n.dancingType d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $exoticisms = $query->getResult();

        return $this->render('web/dance/dancingType.html.twig', array(
            'filmsByDance' => $filmsByDance,
            'myDance' => $myDance,
            'genres' => $genres,
            'dancingTypeByYear' => $dancingTypeByYear,
            'numbers' => $numbers,
            'dancembles' => $dancembles,
            'exoticisms' => $exoticisms
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

        //numbers
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.danceContent d JOIN n.film f WHERE d.thesaurusId = :dance ORDER BY f.released ASC');
        $query->setParameter('dance', $dance);
        $numbers = $query->getResult();

        //ensembles
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.dancemble s JOIN n.danceContent d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $dancembles = $query->getResult();

        //exoticisms
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.exoticism_thesaurus s JOIN n.danceContent d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $exoticisms = $query->getResult();

        return $this->render('web/dance/danceContent.html.twig', array(
            'filmsByDance' => $filmsByDance,
            'myDance' => $myDance,
            'genres' => $genres,
            'danceContentByYear' => $danceContentByYear,
            'numbers' => $numbers,
            'dancembles' => $dancembles,
            'exoticisms' => $exoticisms

        ));
    }

    /**
     * @Route("/dance/dance-subgenre/{dance}", name="getOneDanceSubgenre")
     */
    public function getOneDanceSubgenre($dance){

        $em = $this->getDoctrine()->getManager();

        //filmsByDance
        $query = $em -> createQuery('SELECT DISTINCT(f.title) as title, f.filmId as filmId, f.idImdb as imdb, f.released as released FROM AppBundle:Film f JOIN f.numbers n JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance ORDER BY f.released ASC');
        $query->setParameter('dance', $dance);
        $filmsByDance = $query->getResult();

        //myDance
        $query = $em->createQuery('SELECT DISTINCT(d.title) as title, d.thesaurusId as thesaurusId FROM AppBundle:Film f JOIN f.numbers n JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance');
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

        //dancings
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.dancingType s JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $dancings = $query->getResult();

        //ensembles
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.dancemble s JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $dancembles = $query->getResult();

        //costumes
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.costumes s JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $costumes = $query->getResult();

        //exoticisms
        $query = $em->createQuery('SELECT s.title as title, s.thesaurusId as thesaurusId, COUNT(d.thesaurusId) as nb  FROM AppBundle:Number n JOIN n.exoticism_thesaurus s JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance GROUP BY s.title ORDER BY nb DESC');
        $query->setParameter('dance', $dance);
        $exoticisms = $query->getResult();

        //films and numbers
        $query = $em->createQuery('SELECT n.title as number, n.numberId as numberId, f.title as film FROM AppBundle:Number n JOIN n.film f JOIN n.danceSubgenre d WHERE d.thesaurusId = :dance');
        $query->setParameter('dance', $dance);
        $numbers = $query->getResult();


        return $this->render('web/dance/danceSubgenre.html.twig', array(
            'filmsByDance' => $filmsByDance,
            'myDance' => $myDance,
            'genres' => $genres,
            'danceSubgenreByYear' => $danceSubgenreByYear,
            'contents' => $contents,
            'dancings' => $dancings,
            'dancembles' => $dancembles,
            'costumes' => $costumes,
            'exoticisms' => $exoticisms,
            "numbers" => $numbers

        ));

    }

    /**
     * @Route("/dance/dance-subgenre/{subgenreId}/{type}/{itemId}", name="getOneItemFromDanceSubgenre")
     */
    public function getOneSubgenre($subgenreId, $type, $itemId){

        $em = $this->getDoctrine()->getManager();

        //List of numbers
        if($type == "dancing"){
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.dancingType d JOIN n.danceSubgenre s WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "content"){
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.danceContent d JOIN n.danceSubgenre s WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "ensemble"){
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.dancemble d JOIN n.danceSubgenre s WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "costume"){
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.costumes d JOIN n.danceSubgenre s WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "exoticism"){
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.exoticism_thesaurus d JOIN n.danceSubgenre s WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        $general = $query->getResult();

        //Subgenre
        $query = $em->createQuery('SELECT t FROM AppBundle:Thesaurus t WHERE t.thesaurusId = :subgenreId');
        $query->setParameter('subgenreId', $subgenreId);
        $subgenre = $query->getSingleResult();

        //Item
        $query = $em->createQuery('SELECT t FROM AppBundle:Thesaurus t WHERE t.thesaurusId = :itemId');
        $query->setParameter('itemId', $itemId);
        $item = $query->getSingleResult();

        //Number of items by year
        if($type == "dancing"){
            $query = $em->createQuery('SELECT f.released as released, COUNT(d.thesaurusId) as nb FROM AppBundle:Number n JOIN n.dancingType d JOIN n.danceSubgenre s JOIN n.film f WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY f.released ORDER by f.released ASC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "content"){
            $query = $em->createQuery('SELECT f.released as released, COUNT(d.thesaurusId) as nb FROM AppBundle:Number n JOIN n.danceContent d JOIN n.danceSubgenre s JOIN n.film f WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY f.released ORDER by f.released ASC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "ensemble"){
            $query = $em->createQuery('SELECT f.released as released, COUNT(d.thesaurusId) as nb FROM AppBundle:Number n JOIN n.dancemble d JOIN n.danceSubgenre s JOIN n.film f WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY f.released ORDER by f.released ASC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "costume"){
            $query = $em->createQuery('SELECT f.released as released, COUNT(d.thesaurusId) as nb FROM AppBundle:Number n JOIN n.costumes d JOIN n.danceSubgenre s JOIN n.film f WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY f.released ORDER by f.released ASC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "exoticism"){
            $query = $em->createQuery('SELECT f.released as released, COUNT(d.thesaurusId) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus d JOIN n.danceSubgenre s JOIN n.film f WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY f.released ORDER by f.released ASC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        $itemsByYear = $query->getResult();

        //Performers
        if($type == "dancing"){
            $query = $em->createQuery('SELECT p.name as name, COUNT(p.name) as nb, p.gender as gender FROM AppBundle:Number n JOIN n.dancingType d JOIN n.danceSubgenre s JOIN n.performers p WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY p.name ORDER BY nb DESC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "content"){
            $query = $em->createQuery('SELECT p.name as name, COUNT(p.name) as nb, p.gender as gender FROM AppBundle:Number n JOIN n.danceContent d JOIN n.danceSubgenre s JOIN n.performers p WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY p.name ORDER BY nb DESC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "ensemble"){
            $query = $em->createQuery('SELECT p.name as name, COUNT(p.name) as nb, p.gender as gender FROM AppBundle:Number n JOIN n.dancemble d JOIN n.danceSubgenre s JOIN n.performers p WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY p.name ORDER BY nb DESC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "costume"){
            $query = $em->createQuery('SELECT p.name as name, COUNT(p.name) as nb, p.gender as gender FROM AppBundle:Number n JOIN n.costumes d JOIN n.danceSubgenre s JOIN n.performers p WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY p.name ORDER BY nb DESC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        else if($type == "exoticism"){
            $query = $em->createQuery('SELECT p.name as name, COUNT(p.name) as nb, p.gender as gender FROM AppBundle:Number n JOIN n.exoticism_thesaurus d JOIN n.danceSubgenre s JOIN n.performers p WHERE d.thesaurusId = :itemId AND s.thesaurusId = :subgenreId GROUP BY p.name ORDER BY nb DESC');
            $query->setParameter('itemId', $itemId);
            $query->setParameter('subgenreId', $subgenreId);
        }
        $performers = $query->getResult();

        return $this->render('web/dance/item.html.twig', array(
            'general' => $general,
            'subgenre' => $subgenre,
            'item' => $item,
            'itemsByYear' => $itemsByYear,
            'performers' => $performers
        ));

    }
}
