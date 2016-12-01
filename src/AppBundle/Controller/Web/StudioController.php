<?php

namespace AppBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/studio", name = "getStudios")
 */
class StudioController extends Controller
{
    public function indexAction()
    {
        return $this->render('web/studio/index.html');
    }
}
