<?php

namespace CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuzzleHttp\Client;


use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;


class ScrappingController extends Controller
{
    /**
     * @Route("/scrap", name="scrap")
     */
    public function indexAction()
    {

// create http client instance
        $client = new Client('http://download.cloud.com/releases');

// create a request
        $request = $client->get('/3.0.6/api_3.0.6/TOC_Domain_Admin.html');

// send request / get response
        $response = $request->send();

// this is the response body from the requested page (usually html)
        $result = $response->getBody();

        return $this->render('');
    }
}
