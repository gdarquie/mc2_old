<?php

namespace CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class EditorController extends Controller
{
    /**
     * @Route("/editor", name="editor")
     */
    public function userAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser()->getId();

        //all films
        $films = $em->getRepository('AppBundle:Film')->findAll();

        //all numbers
        $numbers = $em->getRepository('AppBundle:Number')->findAll();

        //Films with number
        $query = $em->createQuery(
            'SELECT f.filmId as filmId, f.title as title  FROM AppBundle:Film f WHERE f.filmId IN (SELECT IDENTITY(n.film) FROM AppBundle:Number n WHERE n.film != 0)'
        );
        $filmsWithNumber = $query->getResult();

        //All Persons
        $persons = $em->getRepository('AppBundle:Person')->findAll();

        // ------------
        //Help numbers
        // ------------

        //List of films where help is need -- 2 is for help
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTitle = 2 OR n.completeTc = 2 OR n.completeStructure = 2 OR n.completeShots = 2 OR n.completeBackstage = 2 OR n.completePerformance = 2 OR n.completeTheme = 2 OR n.completeMood = 2 OR n.completeDance = 2 OR n.completeMusic = 2 OR n.completeDirector = 2 OR n.completeCost = 2 ');
        //OR n.completeReference = 2
        $help = $query->getResult();

        //List of help for title
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTitle = 2');
        $help_title = $query->getResult();

        //List of help for tc
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTc = 2');
        $help_tc = $query->getResult();

        //-----------------
        //My items
        //-----------------

        //My last Numbers (ajouter des options et ue pagination)
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.editors e JOIN n.film f WHERE e.id = :user ORDER BY n.last_update ');
        $query->setParameter('user', $user );
        $myNumbers = $query->getResult();

        //My films
        $query = $em->createQuery('SELECT f.filmId as filmId, f.title as title, f.released as released FROM AppBundle:Number n JOIN n.editors e JOIN n.film f WHERE e.id = :user GROUP BY n.film ORDER BY f.title')
            ->setParameter('user', $user)
        ;
        $myFilms = $query->getResult();

        //-----------------
        //Last changes
        //-----------------

        //Last Numbers changed (limiter à la personne et ajouter des options et ue pagination)
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.editors e WHERE e.id = :user ORDER BY n.last_update ')->setMaxResults(50);
        $query->setParameter('user', $user );
        $myLastNumbers = $query->getResult();

        //Last Films changed (limiter à la personne et ajouter des options et ue pagination)
        $query = $em->createQuery('SELECT f.filmId as id, f.title as title, f.released as released FROM AppBundle:Number n JOIN n.editors e JOIN n.film f WHERE e.id = :user GROUP BY f.filmId ORDER BY n.last_update ')->setMaxResults(50);
        $query->setParameter('user', $user );
        $mylastFilms = $query->getResult();


        return $this->render('CmsBundle:Editor:index.html.twig', array(
            'films' => $films,
            'numbers' => $numbers,
            'filmsWithNumber' => $filmsWithNumber,
            'persons' => $persons,
            'help' => $help,
            'help_title' => $help_title,
            'help_tc' => $help_tc,
            'myLastNumbers' => $myLastNumbers,
            'myLastFilms' => $mylastFilms,
            'myFilms' => $myFilms,
            'myNumbers' => $myNumbers
        ));
    }

    /**
     * @Route("/editor/assist", name="editor_assist")
     */
    public function assistAction(){

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser()->getId();

        //all numbers
        $numbers = $em->getRepository('AppBundle:Number')->findAll();

        // ------------
        //Help numbers
        // ------------

        //List of films where help is need -- 2 is for help
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTitle = 2 OR n.completeTc = 2 OR n.completeStructure = 2 OR n.completeShots = 2 OR n.completeBackstage = 2 OR n.completePerformance = 2 OR n.completeTheme = 2 OR n.completeMood = 2 OR n.completeDance = 2 OR n.completeMusic = 2 OR n.completeDirector = 2 OR n.completeCost = 2 OR n.completeReference = 2');
        $help = $query->getResult();

        //List of help for title
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTitle = 2');
        $help_title = $query->getResult();

        //List of help for tc
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTc = 2');
        $help_tc = $query->getResult();

        //-----------------
        //My items
        //-----------------

        //My last Numbers (ajouter des options et ue pagination)
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.editors e WHERE e.id = :user ORDER BY n.last_update ')->setMaxResults(10);
        $query->setParameter('user', $user );
        $myNumbers = $query->getResult();

        //My films
        $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.editors e JOIN n.film f WHERE e.id = :user GROUP BY n.film ORDER BY f.title')
            ->setParameter('user', $user)
        ;
        $myFilms = $query->getResult();

        return $this->render('CmsBundle:Assist:index.html.twig', array(
            'help' => $help,
            'help_title' => $help_title,
            'help_tc' => $help_tc,
            'myFilms' => $myFilms,
            'myNumbers' => $myNumbers,
            'numbers' => $numbers
        ));
    }

}
