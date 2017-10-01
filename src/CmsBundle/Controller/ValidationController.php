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

        $em = $this->getDoctrine()->getManager();

        //sélectionner tous les films qui ne sont pas encore validés deux fois

        $query = $em->createQuery('SELECT n FROM AppBundle:Number n');
        $numbers = $query->getResult();

//        //List of films where help is need -- 2 is for help
//        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTitle = 2 OR n.completeTc = 2 OR n.completeStructure = 2 OR n.completeShots = 2 OR n.completeBackstage = 2 OR n.completePerformance = 2 OR n.completeTheme = 2 OR n.completeMood = 2 OR n.completeDance = 2 OR n.completeMusic = 2 OR n.completeDirector = 2 OR n.completeCost = 2 ');
//        //OR n.completeReference = 2
//        $help = $query->getResult();
//
//        //List of help for title
//        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTitle = 2');
//        $help_title = $query->getResult();
//
//        //List of help for tc
//        $query = $em->createQuery('SELECT n FROM AppBundle:Number n WHERE n.completeTc = 2');
//        $help_tc = $query->getResult();

        return $this->render('CmsBundle:Validation:index.html.twig', array(



        ));
    }
}
