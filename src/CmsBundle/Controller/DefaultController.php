<?php

namespace CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use AppBundle\Entity\Number;
use AppBundle\Form\NumberType;

use Symfony\Component\Validator\Constraints\DateTime;


class DefaultController extends Controller
{


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

        return $this->render('CmsBundle:Admin:myfilm.html.twig', array(
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

             $user = $this->getUser();
             $number->setFilm($film);
             $number->addEditors($user);

             $now = new \DateTime();
             $number->setDateCreation($now);
             $number->setLastUpdate($now);

             $em->persist($number);
             $em->flush();

            $this->addFlash('success', 'Number created!');

            return $this->redirectToRoute('film', array('filmId' => $filmId));
        }

        return $this->render('CmsBundle:Number:new.html.twig',array(
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
        $film = $number->getFilm();
        $filmId = $film->getFilmId();


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

//            $collection->add($user);

            //récupérer les anciens user
//            $number->setEditors($collection);


            $user = $this->getUser();
            $number->addEditors($user);

            $now = new \DateTime();
            $number->setLastUpdate($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($number);
            $em->flush();

            return $this->redirectToRoute('film', array('filmId' => $filmId));
        }

        return $this->render('CmsBundle:Number:edit.html.twig', array(
            'number' => $number,
            'numberForm' => $form->createView()
            ));
    }


}