<?php

namespace CmsBundle\Controller;

use AppBundle\Entity\Number;
use AppBundle\Form\NumberType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class NumberController extends Controller
{
//Number (add a number for a pre-existing film)

    /**
     * @Route("/editor/film/id/{filmId}/number/new" , name = "number_new")
     */
    public function numberNewAction(Request $request, $filmId)
    {

        $form = $this->createForm(NumberType::class); //add $number

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $number = $form->getData();

            //récupération d'un film
            $em = $this->getDoctrine()->getManager();

            //all films
            $film = $em->getRepository('AppBundle:Film')->findOneByFilmId($filmId);

            //calcule length
            $begin = $number->getBeginTc();
            $end = $number->getEndTc();
            $length = $end-$begin;
            $number->setLength($length);

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
     * @Route("/editor/number/id/{id}/edit" , name = "number_edit")
     */
    public function numberEditAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $number = $em->getRepository('AppBundle:Number')->findOneById($id);
        $film = $number->getFilm();
        $filmId = $film->getFilmId();


        $form = $this->createForm(NumberType::class, $number);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            // dump($form->getData());die;

            //calcule length
            $begin = $number->getBeginTc();
            $end = $number->getEndTc();
            $length = $end-$begin;
            $number->setLength($length);

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
            'numberForm' => $form->createView(),
        ));
    }

    /**
     * Fonction pour effacer via ajax un number
     *
     * @Route("number/delete/{numberId}", name="number_ajax_delete")
     * @Method("DELETE")
     */
    public function deleteAjaxAction($numberId)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        if ($user->hasRole('ROLE_ADMIN')){

            /** @var Number $number */
            $number = $em->getRepository('AppBundle:Number')
                ->find($numberId);
            $em->remove($number);
            $em->flush();
        }

        return new Response(null, 204);

    }


    /**
     * Effacer un item
     *
     * @Route("number/{id}/delete", name="number_delete")
     * @Method({"DELETE","GET"})
     */
    public function deleteAction(Number $number)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        if (!$number) {
            throw $this->createNotFoundException('No number found');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($number);
        $em->flush();

        $this->addFlash('success', 'Deleted Successfully!');
        return $this->redirectToRoute('admin');
    }

    /**
     * Créer un form pour effacer un item
     *
     * @param Number $number
     *
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm(Number $number)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('number_delete', array('id' => $number->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

}
