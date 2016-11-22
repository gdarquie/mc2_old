<?php

namespace AppBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Thesaurus;
use AppBundle\Form\ThesaurusType;

class ThesaurusController extends Controller
{

    /**
     * @Route("/thesaurus/{type}", name="thesaurus")
     */
    public function thesaurusEditorAction($type){

        $em = $this->getDoctrine()->getManager();

        if($type == "all")
        {
            $thesaurus = $em->getRepository('AppBundle:Thesaurus')->findAll();
        }
        else{
            $query = $em->createQuery('SELECT t FROM AppBundle:Thesaurus t WHERE t.type = :type');
            $query->setParameter('type', $type);
            $thesaurus = $query->getResult();
        }

        $query = $em->createQuery('SELECT t FROM AppBundle:Thesaurus t GROUP BY t.type');
        $thesaurusType = $query->getResult();

        //compter le nombre d'item pour chaque thesaurus ???


        return $this->render('web/thesaurus/thesaurus.html.twig', array(
            'thesaurus' => $thesaurus,
            'thesaurusType' => $thesaurusType
        ));


    }

    //Update Thesaurus

    /**
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


    //Nouveau item pour thesaurus

    /**
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
     * @Route("/thesaurus/type/{type}/item/{item}", name="getItemTypeThesaurus")
     */
    public function getNumbersFromItemTypeThesaurus($type, $item){

        $em = $this->getDoctrine()->getManager();

        if($type == 'costumes'){
            $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n INNER JOIN n.costumes c WHERE c.type = :type AND c.title = :item');
        }
        else if($type == 'exoticism'){
            $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n INNER JOIN n.exoticism_thesaurus c WHERE c.type = :type AND c.title = :item');
        }

        //ajouter une catégorie facultative
//        else if($type == 'mood'){
//            $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n INNER JOIN n.general_mood c WHERE c.type = :type AND c.title = :item');
//        }
//        else if($type =='mood'){
//                $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n INNER JOIN n.genre c WHERE c.type = :type AND c.title = :item');
//        }

        //continuer avec les autres types

        $query->setParameter('type', $type);
        $query->setParameter('item', $item);
        $thesaurus = $query->getResult();

        return $this->render('web/thesaurus/numbersFromItem.html.twig', array(
            'thesaurus' => $thesaurus,
        ));

    }

    /**
     * @Route("/exoticism/{item}", name="getExoticism")
     */
    public function getExoticism($item){

        $em = $this -> getDoctrine()->getManager();
        $query = $em -> createQuery('SELECT e FROM AppBundle:Thesaurus e WHERE e.type = :type AND e.title = :item');
        $query->setParameter('type', 'exoticism');
        $query->setParameter('item', $item);
        $exoticism = $query->getResult();

        return $this->render('web/thesaurus/exoticism.html.twig' , array(
            'exoticism' => $exoticism
        ));

    }

}
