<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Thesaurus;
use AppBundle\Form\ThesaurusType;

/**
 * Thesaurus controller.
 *
 * @Route("/editor/thesaurus/test")
 */
class ThesaurusController extends Controller
{
    /**
     * Lists all Thesaurus entities.
     *
     * @Route("/", name="editor_thesaurus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $thesauruses = $em->getRepository('AppBundle:Thesaurus')->findAll();

        return $this->render('thesaurus/index.html.twig', array(
            'thesauruses' => $thesauruses,
        ));
    }

    /**
     * Creates a new Thesaurus entity.
     *
     * @Route("/new", name="editor_thesaurus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $thesaurus = new Thesaurus();
        $form = $this->createForm('AppBundle\Form\ThesaurusType', $thesaurus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('editor_thesaurus_show', array('id' => $thesaurus->getThesaurusId()));
        }

        return $this->render('thesaurus/new.html.twig', array(
            'thesaurus' => $thesaurus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Thesaurus entity.
     *
     * @Route("/{id}", name="editor_thesaurus_show")
     * @Method("GET")
     */
    public function showAction(Thesaurus $thesaurus)
    {
        $deleteForm = $this->createDeleteForm($thesaurus);

        return $this->render('thesaurus/show.html.twig', array(
            'thesaurus' => $thesaurus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Thesaurus entity.
     *
     * @Route("/{id}/edit", name="editor_thesaurus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Thesaurus $thesaurus)
    {
        $deleteForm = $this->createDeleteForm($thesaurus);
        $editForm = $this->createForm('AppBundle\Form\ThesaurusType', $thesaurus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('editor_thesaurus_edit', array('id' => $thesaurus->getThesaurusId()));
        }

        return $this->render('thesaurus/edit.html.twig', array(
            'thesaurus' => $thesaurus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Thesaurus entity.
     *
     * @Route("/{id}", name="editor_thesaurus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Thesaurus $thesaurus)
    {
        $form = $this->createDeleteForm($thesaurus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($thesaurus);
            $em->flush();
        }

        return $this->redirectToRoute('editor_thesaurus_index');
    }

    /**
     * Creates a form to delete a Thesaurus entity.
     *
     * @param Thesaurus $thesaurus The Thesaurus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Thesaurus $thesaurus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editor_thesaurus_delete', array('id' => $thesaurus->getThesaurusId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
