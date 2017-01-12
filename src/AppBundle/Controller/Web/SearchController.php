<?php

namespace AppBundle\Controller\Web;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * @Route("/search")
 */
class SearchController extends Controller
{
    /**
     * @Route("/", name="search")
     */
    public function indexAction()
    {
        return $this->render('web/search/index.html.twig');
    }
}
