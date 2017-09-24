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
     * @Route("/thesaurus/edit/{id}", name="updateThesaurus")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $thesaurus = $em->getRepository('AppBundle:Thesaurus')->find($id);


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

        $id = $thesaurus->getId();

        //Select type de l'id lié
        $query = $em->createQuery('SELECT c.content FROM AppBundle:Thesaurus t JOIN t.code c WHERE t.id = :id');
        $query->setParameter('id', $id);
        $code = $query->getSingleResult();
        $code = $code['content'];

        //construction automatique du getter (attention les majuscules ne sont pas prises en compte, peut-être faudra-t-il les gérer sur linux)
        $myGet = "get".ucfirst($code);
        $myGet = preg_replace('#_#','', $myGet);


        //pb quand ce sont des many to one je crois


        if($code == "adaptation"){

            //Select tous les numbers avec ce type
            $query = $em->createQuery('SELECT f FROM AppBundle:Film f JOIN f.'.$code.' t WHERE t.id = :id');
            $query->setParameter('id', $id);
            $films = $query->getResult();

            foreach ($films as $film){
                dump($film->$myGet());die;
                $film->$myGet()->removeElement($thesaurus);
            }
        }

        else{

            //Select tous les numbers avec ce type
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.'.$code.' t WHERE t.id = :id');
            $query->setParameter('id', $id);
            $numbers = $query->getResult();

            foreach ($numbers as $number){
                $number->$myGet()->removeElement($thesaurus);
            }
        }


        //il peut s'agir des films ou des stagenumbers, etc.


        $em->remove($thesaurus);
        $em->flush();

        $this->addFlash('success', 'Deleted Successfully!');
        return $this->redirectToRoute('admin');
    }
}
