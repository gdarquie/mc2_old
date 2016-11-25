<?php

namespace AppBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ScenarioController extends Controller
{
    /**
     * @Route("/scenario/censorship", name="scenario_censorship")
     */
    public function indexAction()
    {
        $em = $this -> getDoctrine()->getManager();

        //Films by Legion
        $query = $em -> createQuery('SELECT f.title as title, f.legion as legion, f.released as released, COUNT(f.filmId) as nb FROM AppBundle:Film f WHERE f.legion IS NOT NULL GROUP BY f.legion');
        $legion = $query->getResult();

        //Films by Harrison
        $query = $em -> createQuery('SELECT f.title as title, f.harrisson as harrison, f.released as released, COUNT(f.filmId) as nb FROM AppBundle:Film f WHERE f.harrisson IS NOT NULL OR f.harrisson != :value GROUP BY f.harrisson ');
        $query->setParameter('value', '');
        $harrison = $query->getResult();

        //Films by Protestant
        $query = $em -> createQuery('SELECT f.title as title, f.protestant as protestant, f.released as released, COUNT(f.filmId) as nb FROM AppBundle:Film f WHERE f.protestant IS NOT NULL GROUP BY f.protestant');
        $protestant = $query->getResult();

        //Films by Board
        $query = $em -> createQuery('SELECT f.title as title, f.bord as board, f.released as released, COUNT(f.filmId) as nb FROM AppBundle:Film f WHERE f.bord IS NOT NULL GROUP BY f.bord');
        $board = $query->getResult();

        //Films by Verdict
        $query = $em -> createQuery('SELECT f.title as title, f.verdict as verdict, f.released as released, COUNT(f.filmId) as nb FROM AppBundle:Film f WHERE f.verdict IS NOT NULL GROUP BY f.verdict');
        $verdict = $query->getResult();

        //Films by studio
        $query = $em -> createQuery('SELECT f.title as title, s.title as studio, f.released as released, COUNT(f.filmId) as nb FROM AppBundle:Film f JOIN f.studios s GROUP BY s.studioId ORDER BY nb DESC');
        $studios = $query->getResult();


        return $this->render('web/scenario/censorship.html.twig', array(
            'legion' => $legion,
            'harrison' => $harrison,
            'protestant' => $protestant,
            'board' => $board,
            'verdict' =>$verdict,
            'studios' =>$studios
        ));
    }
}
