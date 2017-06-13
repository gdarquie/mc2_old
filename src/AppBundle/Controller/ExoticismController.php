<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExoticismController extends Controller
{
    /**
     * @Route("/search/exoticism")
     */
    public function searchExoticism()
    {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT DISTINCT(t.title) as title, t.thesaurusId as id FROM AppBundle:Thesaurus t WHERE t.type = 'exoticism'");
        $exo = $query->getResult();

        $query = $em->createQuery("SELECT DISTINCT(t.title) as title, t.studioId as id FROM AppBundle:Studio t");
        $studio = $query->getResult();


        return $this->render('AppBundle:exoticism:search.html.twig', array(
            'exo' => $exo,
            'studio' => $studio));
    }
}


