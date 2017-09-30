<?php

namespace CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Validation controller.
 *
 * @Route("validation")
 */
class ValidationController extends Controller
{

    /**
     *
     * @Route("/", name="validation")
     * @Method("GET")
     */
    public function indexAction()
    {

        //sélectionner tous les films qui ne sont pas encore validés deux

        return $this->render('CmsBundle:Validation:index.html.twig', array(

        ));
    }
}
