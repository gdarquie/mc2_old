<?php

namespace AppBundle\Controller\Editor;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use AppBundle\Entity\Number;
use AppBundle\Form\NumberType;

use Symfony\Component\Validator\Constraints\DateTime;


class EditorController extends Controller
{

//Films

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

//Myfilm

    /**
     * @Route("editor/user/{userId}/film/{filmId}", name="myFilm")
     */
    public function indexAction(Request $request, $filmId)
    {

        $myNumbers = "";
        $myFilms = "";

        $em = $this->getDoctrine()->getManager();

        if($this->getUser()){
            $user = $this->getUser()->getId();
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.editors e JOIN n.film f WHERE e.id = :user AND f.filmId = :filmId');
            $query->setParameter('user', $user );
            $query->setParameter('filmId', $filmId );
            $myNumbers = $query->getResult();

            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.editors e WHERE e.id = :user GROUP BY n.film')
                ->setParameter('user', $user)
            ;
            $myFilms = $query->getResult();

        }

        return $this->render('editor/myfilm.html.twig', array(
            'myNumbers' => $myNumbers,
            'myFilms' => $myFilms,
            'user' => $user
        ));
    }


//Number (add a number for a pre-existing film)

    /**
    * @Route("/editor/film/id/{filmId}/number/new" , name = "number_new")
    */
    public function numberNewAction(Request $request, $filmId)
    {

        $form = $this->createForm(NumberType::class); //add $number
        //add a number
        //add an user
        $form->handleRequest($request);

//        dump($form->getData());
//        dump($filmId);
 
         if ($form->isSubmitted() && $form->isValid()){

            $number = $form->getData();
            //récupération d'un film
             $em = $this->getDoctrine()->getManager();

             //all films
             $film = $em->getRepository('AppBundle:Film')->findOneByFilmId($filmId);

             //get user
             $collection = new \Doctrine\Common\Collections\ArrayCollection();
             $user = $this->getUser();
             $collection->add($user);

//             dump($collection);die;

//             dump(new \DateTime());die;

             $number->setFilm($film);
             $number->setEditors($collection);

             $now = new \DateTime();
             $number->setDateCreation($now);
             $number->setLastUpdate($now);

             $em->persist($number);
             $em->flush();

            $this->addFlash('success', 'Number created!');

            return $this->redirectToRoute('film', array('filmId' => $filmId));
        }

        return $this->render('editor/number/new.html.twig',array(
            'numberForm' => $form->createView(),
            'filmId' => $filmId,
            ));
    }

    /**
    * @Route("/editor/number/id/{numberId}/edit" , name = "number_edit")
    */
    public function numberEditAction(Request $request, $numberId){

        $em = $this->getDoctrine()->getManager();
        $number = $em->getRepository('AppBundle:Number')->findOneByNumberId($numberId);

        $form = $this->createForm(NumberType::class, $number);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            // dump($form->getData());die;

            $collection = new \Doctrine\Common\Collections\ArrayCollection();
            $user = $this->getUser();

//
//            $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.numberId = :numberId');
//            $query->setParameter('numberId', $numberId );
//             récupérer tous les user d'un number
//
//            $user = $query->getResult();

            $collection->add($user);

            //récupérer les anciens user
            $number->setEditors($collection);

            $now = new \DateTime();
            $number->setLastUpdate($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($number);
            $em->flush();
        }

        return $this->render('editor/number/edit.html.twig', array(
            'number' => $number,
            'numberForm' => $form->createView()
            ));
    }


//Structure of 1 number

    /**
     * @Route("/editor/number/{number}/structure/new", name="numberStructureNew")
     */
    public function numberStructureNewAction(Request $request, $number){
        $em = $this->getDoctrine()->getManager();

        $number = $em->getRepository('AppBundle:Number')->findOneByNumberId($number);

        $query = $em->createQuery('SELECT t.title FROM AppBundle:Thesaurus t WHERE t.type = :type');
        $query->setParameter('type', "structure");
        $structures = $query->getResult();
       

        $thesaurus = new Thesaurus();
        $form = $this->createForm('AppBundle\Form\ThesaurusType', $thesaurus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('numberStructureNew', array('id' => $thesaurus->getThesaurusId()));
            // à reprendre
        }

        return $this->render('editor/structure/new.html.twig', array(
            'thesaurus' => $thesaurus,
            'structures' => $structures,
            'number' => $number,
            'form' => $form->createView(),
        ));

    }







}