<?php

namespace CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Thesaurus;
use AppBundle\Form\ThesaurusType;

class ThesaurusController extends Controller
{

    /**
     *
     * Create new thesaurus item
     *
     * @Route("/thesaurus/add/new", name="newThesaurus")
     */
    public function addThesaurusEditorAction(Request $request){

        $thesaurus = new Thesaurus();

        $form = $this->createForm(ThesaurusType::class, $thesaurus);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('thesaurus', array('type' => 'all' ));
        }


        return $this->render('web/thesaurus/thesaurusNew.html.twig', array(
            'form' => $form->createView(),
        ));

    }


    /**
     * Update Thesaurus
     *
     * @Route("/thesaurus/edit/{thesaurusId}", name="updateThesaurus")
     */
    public function updateAction(Request $request, $thesaurusId)
    {
        $em = $this->getDoctrine()->getManager();
        $thesaurus = $em->getRepository('AppBundle:Thesaurus')->find($thesaurusId);


        if (!$thesaurus) {
            throw $this->createNotFoundException(
                'No item found for id '
            );
        }


        $form = $this->createForm(ThesaurusType::class, $thesaurus);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('thesaurus', array('type' => $thesaurus->getType() ));
        }

        return $this->render('web/thesaurus/thesaurusNew.html.twig', array(
            'form' => $form->createView(),
        ));
    }



    /**
     *
     * Effacer un item
     *
     * @Route("thesaurus/{id}/delete", name="thesaurus_delete")
     * @Method({"DELETE","GET"})
     */
    public function deleteAction(Thesaurus $thesaurus)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        if (!$thesaurus) {
            throw $this->createNotFoundException('No thesaurus found');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($thesaurus);
        $em->flush();

        $this->addFlash('success', 'Deleted Successfully!');
        return $this->redirectToRoute('admin');
    }
}
