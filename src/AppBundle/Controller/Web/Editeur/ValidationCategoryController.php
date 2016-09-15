<?php

namespace AppBundle\Controller\Web\Editeur;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\ValidationCategory;


class ValidationCategoryController extends Controller
{

    /**
     * @Route("/editor/validationcategory/add/new", name="editorNewValidationCategory")
     */
    public function addAction(Request $request){

        $validationCategory = new ValidationCategory();

        $form = $this->createForm(ValidationCategory::class, $validationCategory);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('editor');
        }

        return $this->render('editor/validationCategory/new.html.twig', array(
            'validationCategoryForm' => $form->createView()
        ));

    }
}
