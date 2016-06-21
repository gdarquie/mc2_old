<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


use AppBundle\Entity\Film;
use AppBundle\Entity\Person;
use AppBundle\Entity\Number;
use AppBundle\Form\NumberType;

class EditorController extends Controller
{


	//Tous les films

    /**
     * @Route("/editor", name="editor")
     */
    public function editorAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        //all films
        $films = $em->getRepository('AppBundle:Film')->findAll(); 

        //Films with number
        $query = $em->createQuery(
            'SELECT f.filmId as filmId, f.title as title, f.released as released  FROM AppBundle:Film f WHERE f.filmId IN (SELECT IDENTITY(n.film) FROM AppBundle:Number n WHERE n.film != 0)'
            );  
        $filmsWithNumber = $query->getResult();

        //All Persons
        $persons = $em->getRepository('AppBundle:Person')->findAll();
        
        return $this->render('editor/index.html.twig', array(
            'films' => $films,
            'filmsWithNumber' => $filmsWithNumber,
            'persons' => $persons,
        ));
    }


    //Tous les numbers d'un film

    /**
     * @Route("/editor/film/{film}", name="editorFilm")
     */
    public function editorFilmAction($film)
    {
        $em = $this->getDoctrine()->getManager();

        //les infos du film
        $film = $em->getRepository('AppBundle:Film')->findOneByFilmId($film);

        //tous les numbers du film
	    $query = $em->createQuery(
	        'SELECT  (n.numberId) as id, (n.title) as title, (n.film) as film, (n.beginTc) as beginTc, (n.endTc) as endTc, (n.length) as length FROM AppBundle:Number n WHERE n.film = :film ORDER BY n.beginTc' 
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
        
        return $this->render('editor/film.html.twig', array(
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

        //conversion en timecode : echo gmdate("H:i:s", 685);

    }


    /**
     * @Route("/editor/film/{film}/number/{number}", name="editorNumber")
     */
    public function editorNumberAction($film,$number)
    {
        $em = $this->getDoctrine()->getManager();

        $film = $em->getRepository('AppBundle:Film')->findOneByFilmId($film);
        
        $number = $em->getRepository('AppBundle:Number')->findOneByNumberId($number); //voir un number d'un film + edit le number
        
        return $this->render('editor/number.html.twig', array(
        	'film' => $film,
            'number' => $number,

        ));
    }

    


}