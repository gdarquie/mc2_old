<?php
/**
 * Created by PhpStorm.
 * User: gaetan
 * Date: 19/09/2016
 * Time: 11:22
 */

namespace AppBundle\Controller\Editor;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Person;
use AppBundle\Form\PersonType;


class PersonController extends Controller
{
    /**
     * @Route("/editor/person/add/new", name="editorNewPerson")
     */
    public function addAction(Request $request)
    {

        $person = new person();

        $form = $this->createForm(personType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $collection = new \Doctrine\Common\Collections\ArrayCollection();
            $user = $this->getUser();
            $collection->add($user);

            $person->setEditors($collection);

            $now = new \DateTime();
            $person->setDateCreation($now);
            $person->setLastUpdate($now);

            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute('editor');
        }

        return $this->render('editor/person/new.html.twig', array(
            'personForm' => $form->createView()
        ));
    }


    /**
     * @Route("/editor/person/id/{personId}/edit" , name = "person_edit")
     */
    public function personEditAction(Request $request, $personId)
    {

        $em = $this->getDoctrine()->getManager();
        $person = $em->getRepository('AppBundle:person')->findOneBypersonId($personId);

        $form = $this->createForm(personType::class, $person);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $collection = new \Doctrine\Common\Collections\ArrayCollection();
            $user = $this->getUser();
            $collection->add($user);
            $person->setEditors($collection);

            $now = new \DateTime();
            $person->setLastUpdate($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
        }

        return $this->render('editor/person/edit.html.twig', array(
            'person' => $person,
            'personForm' => $form->createView()
        ));
    }
}

