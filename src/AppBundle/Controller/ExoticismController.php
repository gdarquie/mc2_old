<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Selection;
use AppBundle\Form\SelectionType;

class ExoticismController extends Controller
{
    /**
     * @Route("/search/exoticism", name="search_exotic")
     */
    public function searchExoticism(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT DISTINCT(t.title) as title, t.thesaurusId as id FROM AppBundle:Thesaurus t WHERE t.type = 'exoticism'");
        $exo = $query->getResult();

        $query = $em->createQuery("SELECT DISTINCT(t.title) as title, t.studioId as id FROM AppBundle:Studio t");
        $studio = $query->getResult();

        $selection = new Selection();
        $form = $this->createForm(SelectionType::class, $selection);
        $form->handleRequest($request);

//        dump($selection);die;
        if ($form->isSubmitted() && $form->isValid()){

            $this->addFlash('success', 'Redirection vers la page de viz'.$selection);
            return $this->redirectToRoute('view_exoticism', array('selection' => $selection));
        }


        return $this->render('AppBundle:exoticism:search.html.twig', array(
            'exo' => $exo,
            'studio' => $studio,
            'selectionForm' => $form->createView()
        ));
    }

    /**
     * @Route("/view/exoticism", name="view_exoticism")
     */
    public function vizExoticism($selection = 0){


        return $this->render('AppBundle:exoticism:viz.html.twig');

    }
}


