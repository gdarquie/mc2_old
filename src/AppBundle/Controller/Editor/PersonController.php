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
    public function addAction(Request $request){

        $person = new Person();

        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute('editor');
        }

        return $this->render('editor/person/new.html.twig', array(
            'personForm' => $form->createView()
        ));
    }


}



