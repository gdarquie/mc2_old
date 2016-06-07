<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Film;
use AppBundle\Entity\Number;

class EditorController extends Controller
{


	//Tous les films

    /**
     * @Route("/editor", name="editor")
     */
    public function editorAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $films = $em->getRepository('AppBundle:Film')->findAll(); //voir tous les films + chercher un film = la page d'accueil de l'éditeur
        
        return $this->render('editor/index.html.twig', array(
            'films' => $films,
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
            'SELECT SUM(f.length) as total, (f.length) as length FROM AppBundle:Number f WHERE f.film = :film'
            ); 
        $query->setParameter('film', $film);
        $numberSumLength = $query->getResult();


	    //faire une viz avec la chronologie des numbers

        //voir tous les numbers d'un film (lien pour modifier le number) + ajouter un number
        
        return $this->render('editor/film.html.twig', array(
            'film' => $film,
            'numbersOf1Film' => $numbersOf1Film,
            'numberAverageLength' => $numberAverageLength,
            'numbersAverageLength' => $numbersAverageLength,
            'numberSumLength' => $numberSumLength,
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