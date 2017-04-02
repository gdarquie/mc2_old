<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;


/**
 * @Route("/films")
 */
class FilmController extends Controller
{
    /**
     * @Route("/", name = "films")
     */
    public function showAllAction(){

        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository('AppBundle:Film')->findAll();


        $query = $em->createQuery('SELECT f FROM AppBundle:Film f WHERE f.studio IS NOT NULL ORDER BY f.studio ASC');
        $filmsByStudio = $query->getResult();

        $query = $em->createQuery('SELECT f.title as title, f.idImdb as imdb, COUNT(f.title) as nb FROM AppBundle:Film f GROUP BY f.idImdb ORDER BY nb DESC')->setMaxResults(9);
        $filmsImdb = $query->getResult();


        $query = $em->createQuery('SELECT f.title as title FROM AppBundle:Film f GROUP BY f.idImdb HAVING COUNT(f) > 1');
        $filmsDuplicate = $query->getResult();

        return $this->render('web/films/index.html.twig',array(
            'films' => $films,
            'filmsByStudio' => $filmsByStudio,
            'filmsImdb' => $filmsImdb,
            'filmsDuplicate' => $filmsDuplicate
        ));
    }

    /**
     * @Route("/{type}/{item}", name = "filmsByThesaurus")
     */
    public function filmsByThesaurus($type, $item){

        $em = $this->getDoctrine()->getManager();

        if($type == 'costumes'){
            $query = $em->createQuery('SELECT f.title as film,f.released as released, f.studio as studio, COUNT(n.title) as nb FROM AppBundle:Number n  JOIN n.costumes c JOIN n.film f WHERE c.type = :type AND c.title = :item GROUP BY f.title ORDER BY nb DESC');
        }
        else if($type == 'exoticism'){
            $query = $em->createQuery('SELECT f.title as film,f.released as released, f.studio as studio, COUNT(n.title) as nb FROM AppBundle:Number n  JOIN n.exoticism_thesaurus c  JOIN n.film f  WHERE c.type = :type AND c.title = :item GROUP BY f.title ORDER BY nb DESC');
        }
        else if($type == 'structure'){
            $query = $em->createQuery('SELECT f.title as film, f.released as released, f.studio as studio, COUNT(n.title) as nb FROM AppBundle:Number n  JOIN n.structure c  JOIN n.film f  WHERE c.type = :type AND c.title = :item GROUP BY f.title ORDER BY nb DESC');
        }

        $query->setParameter('type', $type);
        $query->setParameter('item', $item);
        $films = $query->getResult();

        return $this->render('web/films/filmsByThesaurus.html.twig', array(
            'films' => $films
        ));
    }

    /**
     * @Route("/structure/{structure}/exoticism/{exoticism}", name = "filmsByThesaurusX2")
     */
    public function filmsByThesaurusX2($structure, $exoticism){

        $em = $this->getDoctrine()->getManager();


        $query = $em->createQuery('SELECT f.title as film,f.released as released, f.studio as studio, COUNT(n.title) as nb FROM AppBundle:Number n  JOIN n.exoticism_thesaurus e JOIN n.structure s JOIN n.film f WHERE e.title = :exoticism AND s.title = :structure GROUP BY f.title ORDER BY nb DESC');

        $query->setParameter('structure', $structure);
        $query->setParameter('exoticism', $exoticism);
        $films = $query->getResult();

        return $this->render('web/films/filmsByThesaurus.html.twig', array(
            'films' => $films
        ));
    }


}
