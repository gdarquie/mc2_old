<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Number;
use AppBundle\Form\NumberType;

/**
 * Number controller.
 *
 * @Route("/number")
 */
class NumberController extends Controller
{
    /**
     * Lists all Number entities.
     *
     * @Route("/", name="number_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $numbers = $em->getRepository('AppBundle:Number')->findAll();

        return $this->render('number/index.html.twig', array(
            'numbers' => $numbers,
        ));
    }

    /**
     * Creates a new Number entity.
     *
     * @Route("/new", name="number_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $number = new Number();
        $form = $this->createForm('AppBundle\Form\NumberType', $number);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($number);
            $em->flush();

            return $this->redirectToRoute('number_show', array('id' => $number->getId()));
        }

        return $this->render('number/new.html.twig', array(
            'number' => $number,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Number entity.
     *
     * @Route("/{id}", name="number_show")
     * @Method("GET")
     */
    public function showAction(Number $number)
    {
        $deleteForm = $this->createDeleteForm($number);

        return $this->render('number/show.html.twig', array(
            'number' => $number,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Number entity.
     *
     * @Route("/{id}/edit", name="number_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Number $number)
    {
        $deleteForm = $this->createDeleteForm($number);
        $editForm = $this->createForm('AppBundle\Form\NumberType', $number);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($number);
            $em->flush();

            return $this->redirectToRoute('number_edit', array('id' => $number->getId()));
        }

        return $this->render('number/edit.html.twig', array(
            'number' => $number,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Number entity.
     *
     * @Route("/{id}", name="number_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Number $number)
    {
        $form = $this->createDeleteForm($number);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($number);
            $em->flush();
        }

        return $this->redirectToRoute('number_index');
    }

    /**
     * Creates a form to delete a Number entity.
     *
     * @param Number $number The Number entity
     *
     * @return \Symfony\Component\Form\Form The form
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
