<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Query\ResultSetMapping;

use AppBundle\Entity\Film;
use AppBundle\Entity\Number;
use AppBundle\Entity\Person;
use AppBundle\Entity\Mood;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $films = $em->getRepository('AppBundle:Film')->findAll();
        $numbers = $em->getRepository('AppBundle:Number')->findAll();
        
        return $this->render('default/index.html.twig', array(
            'films' => $films,
            'numbers' => $numbers,
        ));
    }

    /**
     * @Route("/stats", name="stats")
     */
    public function statsAction()
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p.released as year, COUNT (DISTINCT(p.title)) as nb
            FROM AppBundle:Film p GROUP BY p.released ' //ORDER BY nb DESC
            );  
        $nbFilmsByYear = $query->getResult();

        //Nombre de number par année
        $query = $em->createQuery(
            'SELECT f.released as year, COUNT(DISTINCT(n.title)) as nb FROM AppBundle:Number n JOIN n.film f GROUP BY f.released'
            );  
        $nbNumbersByYear = $query->getResult();

        //Nombre de sources de number par année
        $query = $em->createQuery(
            'SELECT f.released as year, COUNT(DISTINCT(n.title)) as nb FROM AppBundle:Number n JOIN n.film f WHERE n.source = :source GROUP BY f.released '
            );  
        $query->setParameter('source', 'borrowed from the musical repertoire');
        $source1ByYear = $query->getResult();

        //Répartition des socialPlaces pour les numbers (à reprendre avec la bonne requête)
        $query = $em->createQuery(
            'SELECT f.released as year, COUNT(DISTINCT(n.title)) as nb FROM AppBundle:Number n JOIN n.film f GROUP BY f.released'
            );  
        $nbSocialPlaceByNumber =$query->getResult();


        //tous les films qui ont au moins un number
        $query = $em->createQuery(
            'SELECT f.title as films FROM AppBundle:Film f WHERE f.filmId IN (SELECT IDENTITY(n.film) FROM AppBundle:Number n WHERE n.film != 0)'
            );  
        $nbFilmsWithNumber = $query->getResult();

        //All movies
        $films = $em->getRepository('AppBundle:Film')->findAll();

        //Sélection de 10 films (à limiter à 10)
        $last10Films = $em->getRepository('AppBundle:Film')->findAll(); //mettre un set max Results à 10

        //Tous les numbers
        $numbers = $em->getRepository('AppBundle:Number')->findAll();

        //Total des durées de film
        $query = $em->createQuery(
            'SELECT SUM(f.length) as length FROM AppBundle:Film f' 
            ); 
        $filmsLength = $query->getResult();

        //Moyenne des durées de film
        $query = $em->createQuery(
            'SELECT SUM(f.length) / COUNT(f.title) as average FROM AppBundle:Film f'
            ); 
        $filmsAverageLength = $query->getResult();

        //Le film le plus long
        $query = $em->createQuery(
            'SELECT f.title as title, f.length as length FROM AppBundle:Film f WHERE f.length = (SELECT MAX(m.length) FROM AppBundle:Film m WHERE m.length > 2700)' 
            ); 
        $filmsMaxLength = $query->setMaxResults(1)->getResult();        

        //film le plus court
        $query = $em->createQuery(
            'SELECT f.title as title, f.length as length FROM AppBundle:Film f WHERE f.length = (SELECT MIN(m.length) FROM AppBundle:Film m WHERE m.length > 2700)' 
            ); 
        $filmsMinLength = $query->setMaxResults(1)->getResult(); 

        //unknwow length movie
        $query = $em->createQuery(
            'SELECT f.filmId as filmId, f.title as title FROM AppBundle:Film f WHERE f.length = 0' 
            );
        $filmsNoLength = $query->getResult();

        //length problem movie
        $query = $em->createQuery(
            'SELECT f.filmId as filmId, f.title as title, f.length as length FROM AppBundle:Film f WHERE f.length != 0 AND f.length < 2000 OR f.length > 15000' 
            );
        $filmsPbLength = $query->getResult();

        //All stage show
        $shows = $em->getRepository('AppBundle:StageShow')->findAll();

        //50 Last Stage Shows
        $query = $em->createQuery(
            'SELECT s.title as title FROM AppBundle:StageShow s ORDER BY s.opening DESC' 
            );
        $last100shows = $query->setMaxResults(50)->getResult();

        //Longest Runnning Stage Shows
        $query = $em->createQuery(
            'SELECT s.title as title, s.ibdb as ibdb FROM AppBundle:StageShow s WHERE s.closing < 19720101 AND s.opening > 19270101  ORDER BY s.count DESC' 
            );
        $longRunShows = $query->setMaxResults(50)->getResult();

        //Number Stage Show by Year (native ne marche pas)
        // $rsm = new ResultSetMapping();
        // $query = $em->createNativeQuery('SELECT title FROM stageShow ', $rsm);
        // $nbShowsByYear = $query->getResult();

        //All Persons
        $persons = $em->getRepository('AppBundle:Person')->findAll();

        //all director

        //all lyricist

        //all composer

        return $this->render('stats/index.html.twig', array(
            'nbFilmsByYear' => $nbFilmsByYear,
            'nbNumbersByYear' => $nbNumbersByYear,
            'numbers' => $numbers,
            'films' => $films,
            'shows' => $shows,
            'persons' => $persons,
            'nbFilmsWithNumber'=> $nbFilmsWithNumber,
            'last10Films' => $last10Films,
            'filmsLength' => $filmsLength,
            'filmsAverageLength' => $filmsAverageLength, 
            'filmsMaxLength' => $filmsMaxLength, 
            'filmsMinLength' => $filmsMinLength, 
            'source1ByYear' => $source1ByYear,
            'nbFilmsWithNumber' => $nbFilmsWithNumber,
            'filmsNoLength' => $filmsNoLength,
            'filmsPbLength' => $filmsPbLength,
            'last100shows' => $last100shows,
            'longRunShows' => $longRunShows,

        ));

    }

    /**
     * @Route("/hypothese/genre", name="hypothese-mood")
     */
    public function moodAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $films = $em->getRepository('AppBundle:Film')->findAll();
        $numbers = $em->getRepository('AppBundle:Number')->findAll();
        $moods = $em->getRepository('AppBundle:Mood')->findAll();
 
        //répartition des moods par numbers
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT m.title as title
            FROM AppBundle:Mood m' //ORDER BY nb DESC //ajouter les liens avec number
            );  
        $moodsByNumber = $query->getResult();

        
        return $this->render('hypo/mood.html.twig', array(
            'films' => $films,
            'numbers' => $numbers,
            'moods' => $moods,
            'moodsByNumber' => $moodsByNumber,
        ));
    }

     /**
     * @Route("/hypothese/form", name="hypothese-form")
     */
    public function completeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $films = $em->getRepository('AppBundle:Film')->findAll();
        $numbers = $em->getRepository('AppBundle:Number')->findAll();
        $completenesses = $em->getRepository('AppBundle:Completeness')->findAll();

        //répartition des completenesses par numbers
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c.title as title, COUNT(c) as nb
            FROM AppBundle:Completeness c JOIN c.number n  GROUP BY c.title ORDER BY nb DESC' //ORDER BY nb DESC //ajouter les liens avec number
            );  
        $CompsByNumber = $query->getResult();


        //répartition des complétudes de pause par film (les 10 films qui ont le plus de pause)
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT f.title as title, f.released as year, COUNT(c) as nb
            FROM AppBundle:Completeness c JOIN c.number n JOIN n.film f WHERE c.title = :title GROUP BY f.title ORDER BY year ASC'
            )->setParameter('title', 'pause');
        $pauseByFilms = $query->getResult();

        //répartition des complétudes de pause par film (les 10 films qui ont le plus de pause)
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT f.title as title, f.released as year, COUNT(c) as nb
            FROM AppBundle:Completeness c JOIN c.number n JOIN n.film f WHERE c.title = :title GROUP BY f.title ORDER BY year ASC'
            )->setParameter('title', 'false start');
        $falseByFilms = $query->getResult();

        //les sources 


        //Durée moyenne d'un number par source
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT n.title as title, AVG(n.length) as length
            FROM AppBundle:Number n GROUP BY n.source'
            );
        $averageNumberLengthBySource = $query->getResult();

        
        return $this->render('hypo/completeness.html.twig', array(
            'films' => $films,
            'numbers' => $numbers,
            'completenesses' => $completenesses,
            'CompsByNumber' => $CompsByNumber,
            'pauseByFilms' => $pauseByFilms,
            'falseByFilms' => $falseByFilms,
            'averageNumberLengthBySource' => $averageNumberLengthBySource,
        ));
    }


    /**
     * @Route("/search/{string}", name="search")
     */
    public function search($string)
        {

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
         ->getRepository('AppBundle:Film');   

       $query = $em->createQuery(
            'SELECT (f.title) as title FROM AppBundle:Film f WHERE f.title LIKE TRIM(:search)' 
            ); 
        $query->setParameter('search', '%'.$string.'%'); //au lieu de string il faut récupérer la variable transmise par le formulaire
        $films = $query->getResult();   

        return $this->render('search.html.twig', array(
            'films' => $films,
        ));

    }



}
