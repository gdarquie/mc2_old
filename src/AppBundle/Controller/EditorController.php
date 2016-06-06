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
     * @Route("/editor/film/{film}", name="numbersOf1Film")
     */
    public function editorFilmAction($film)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository('AppBundle:Film')->findOneByFilmId($film);

	    $query = $em->createQuery(
	        'SELECT (n) as numbers FROM AppBundle:Number n WHERE n.film = :film' 
	        ); 
	    $query->setParameter('film', $film);
	    $numbersOf1Film = $query->getResult(); 

        //voir tous les numbers d'un film (lien pour modifier le number) + ajouter un number
        
        return $this->render('editor/film.html.twig', array(
            'film' => $film,
            'numbersOf1Film' => $numbersOf1Film,
        ));
    }


    /**
     * @Route("/editor/film-{film}/number-{number}", name="numbers")
     */
    public function editorNumberAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $films = $em->getRepository('AppBundle:Film')->findAll(); //voir un number d'un film + edit le number
        
        return $this->render('editor/index.html.twig', array(
            'films' => $films,
        ));
    }

}