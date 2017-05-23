<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Query\ResultSetMapping;


class DefaultController extends Controller
{

//Home Page

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        // dump($em->getRepository('AppBundle:Number'));

        //all films
        $films = $em->getRepository('AppBundle:Film')->findAll();
        // $films = $em->getRepository('AppBundle:Film')
        //     ->findAllOrderdByTitle();

        //get user
        $user = $this->getUser();

        //Films with number
        $query = $em->createQuery('SELECT f.filmId as filmId, f.title as title, f.idImdb as idImdb, f.released as released  FROM AppBundle:Film f WHERE f.filmId IN (SELECT IDENTITY(n.film) FROM AppBundle:Number n WHERE n.film != 0) ORDER BY f.released ASC');
        $filmsWithNumber = $query->getResult();

        $numbers = $em->getRepository('AppBundle:Number')->findAll();


        $numbers = $em->getRepository('AppBundle:Number')->findAll();

        //All Persons
        $persons = $em->getRepository('AppBundle:Person')->findAll();

        //My numbers

        $myNumbers = "";
        $myFilms = "";

        if($this->getUser()){
            $user = $this->getUser()->getId();
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.editors e WHERE e.id = :user ORDER BY n.last_update DESC');
            $query->setParameter('user', $user );
            $myNumbers = $query->getResult();

            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.editors e WHERE e.id = :user GROUP BY n.film')
                ->setParameter('user', $user)
            ;
            $myFilms = $query->getResult();
        }

        $query = $em->createQuery(
            'SELECT COUNT(f.filmId) as nb, f.released as year FROM AppBundle:Film f  WHERE f.released > 1900 GROUP BY f.released'
        );
        $nbFilmsByYear = $query->getResult();

        $query = $em->createQuery(
            'SELECT COUNT(f.filmId) as nb, f.released as year, f.idImdb as idImdb FROM AppBundle:Film f  WHERE f.released > 1900 AND f.filmId IN (SELECT IDENTITY(n.film) FROM AppBundle:Number n WHERE n.film != 0)GROUP BY f.released'
        );
        $nbFilmsWithNumbersByYear = $query->getResult();

        //All numbers by Year
        $query = $em->createQuery(
            'SELECT f.released, COUNT(n.title) as nb, COUNT(DISTINCT(f.title)) as nbFilms FROM AppBundle:Film f LEFT JOIN f.numbers n WHERE f.released > 0 GROUP BY f.released   ORDER BY f.released ASC'
        );
        $nbNumbersByYear = $query->getResult();

        return $this->render('index.html.twig', array(
            'films' => $films,
            'filmsWithNumber' => $filmsWithNumber,
            'persons' => $persons,
            'numbers' => $numbers,
            'myNumbers' => $myNumbers,
            'myFilms' => $myFilms,
            'user' => $user,
            'nbFilmsByYear' => $nbFilmsByYear,
            'nbFilmsWithNumbersByYear' => $nbFilmsWithNumbersByYear,
            'nbNumbersByYear' => $nbNumbersByYear
        ));
    }


//All movies

    /**
    * @Route("/films/{page}", name = "films")
    */
    public function filmsAction($page){
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository('AppBundle:Film')->findAll();

        return $this->render('films.html.twig', array(
                'films' => $films,
                'page' => $page,
            ));
    }

//1 Movie By Id

    /**
    * @Route("/film/id/{filmId}", name="film")
    */
    public function filmAction($filmId){

        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository('AppBundle:Film')->findOneByFilmId($filmId);

        //tous les numbers du film
        $query = $em->createQuery(
            'SELECT  (n.numberId) as id, (n.title) as title, (n.film) as film, (n.beginTc) as beginTc, (n.endTc) as endTc, (n.length) as length, (t.title) as structure, (n.length)/(n.shots) as average, (n.cast) as cast, (n.shots) as shots FROM AppBundle:Number n LEFT JOIN n.structure as t  WHERE n.film = :film ORDER BY n.beginTc'
            ); 
        $query->setParameter('film', $film);
        $numbersOf1Film = $query->getResult(); 

        //moyenne des number pour le film
        $query = $em->createQuery(
            'SELECT SUM(f.length) / COUNT(f.title) as average FROM AppBundle:Number f WHERE f.film = :film'
            ); 
        $query->setParameter('film', $film);
        $numberAverageLength = $query->getResult();

        //moyenne des number pour tous les films
        $query = $em->createQuery(
            'SELECT SUM(f.length) / COUNT(f.title) as average FROM AppBundle:Number f'
            ); 
        $numbersAverageLength = $query->getResult();

        //addition de tous les numbers pour le film
         $query = $em->createQuery(
            'SELECT SUM(n.length) as total, (f.length) as length FROM AppBundle:Number n JOIN n.film f WHERE n.film = :film'
            ); 
        $query->setParameter('film', $film);
        $numberSumLength = $query->getResult();

        //persons linked to a movie
        $query = $em->createQuery(
            'SELECT a.personId as personId FROM AppBundle:FilmHasPerson a WHERE a.filmId = :film' //film has person
            ); //SELECT p.name FROM AppBundle:Person p WHERE p.personId IN ()
        $query->setParameter('film', $film);
        $persons1Film = $query->getResult();


        //All Persons
        $persons = $em->getRepository('AppBundle:Person')->findAll();

        //All Professions
        $professions = $em->getRepository('AppBundle:Profession')->findAll();

        //All Numbers
        $numbers = $em->getRepository('AppBundle:Number')->findAll();


        //faire une viz avec la chronologie des numbers

        //voir tous les numbers d'un film (lien pour modifier le number) + ajouter un number

        if (!$film) {
        
            return $this->render('404.html.twig', array(
                'message' => 'No Film found for id '.$filmId
                ));
        }

        return $this->render('film.html.twig', array(
            'film' => $film,
            'numbers' => $numbers,
            'numbersOf1Film' => $numbersOf1Film,
            'numberAverageLength' => $numberAverageLength,
            'numbersAverageLength' => $numbersAverageLength,
            'numberSumLength' => $numberSumLength,
            'persons' => $persons,
            'professions' => $professions,
            'persons1Film' => $persons1Film,
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
            'SELECT n.source as title, AVG(n.length) as average, COUNT(n.length) as nb 
            FROM AppBundle:Number n GROUP BY n.source ORDER BY nb DESC'
            );
        $query->setMaxResults(6);
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

    /**
     * @Route("/howto", name="howto")
     */
    public function howto(){

        return $this->render('howto.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function apropos(){

        return $this->render('about.html.twig');
    }

    /**
     * @Route("/news", name="news")
     */
    public function newTo(){

        return $this->render('news.html.twig');
    }

    /**
     * @Route("/presentation", name="presentation")
     */
    public function present(){
        return $this->render(':web/presentation:index.html.twig');
    }

}
