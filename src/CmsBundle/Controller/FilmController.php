<?php
/**
 * Created by PhpStorm.
 * User: gaetan
 * Date: 19/09/2016
 * Time: 11:22
 */

namespace CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;

class FilmController extends Controller
{
    /**
     * @Route("/editor/film/add/new", name="editorNewFilm")
     */
    public function addAction(Request $request){

        $film = new Film();

        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            return $this->redirectToRoute('editor');
        }

        return $this->render('CmsBundle:Film:new.html.twig', array(
            'filmForm' => $form->createView()
        ));
    }


    /**
     * @Route("/editor/film/id/{filmId}/edit" , name = "film_edit")
     */
    public function filmEditAction(Request $request, $filmId){

        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository('AppBundle:Film')->findOneByfilmId($filmId);

        $form = $this->createForm(filmType::class, $film);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();
        }

        return $this->render('CmsBundle:Film:edit.html.twig', array(
            'film' => $film,
            'filmForm' => $form->createView()
        ));
    }


}



