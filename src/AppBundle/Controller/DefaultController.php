<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Film;
use AppBundle\Entity\Number;

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


//changer avec la bonne requête
        //tous les films qui ont au moins un number -> ajouter la condition au moins un number...
        $query = $em->createQuery(
            'SELECT f.title as films FROM AppBundle:Film f'
            );  
        $nbFilmsWithNumber = $query->getResult();

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

        return $this->render('stats/index.html.twig', array(
            'nbFilmsByYear' => $nbFilmsByYear,
            'nbNumbersByYear' => $nbNumbersByYear,
            'numbers' => $numbers,
            'films' => $films,
            'nbFilmsWithNumber'=> $nbFilmsWithNumber,
            'last10Films' => $last10Films,
            'filmsLength' => $filmsLength,
            'filmsAverageLength' => $filmsAverageLength, 
            'filmsMaxLength' => $filmsMaxLength, 
            'filmsMinLength' => $filmsMinLength, 
            'source1ByYear' => $source1ByYear,
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
