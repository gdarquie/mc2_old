<?php

namespace AppBundle\Controller\Test;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("/test")
 */
class RequestTestController extends Controller
{
    /**
     * @Route("/get")
     */
    public function indexAction()
    {
//        $request = Request::createFromGlobals();
//        $request->server->get('api/films');
//        $request->query->get('films');
//        dump($request);die();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://igdbcom-internet-game-database-v1.p.mashape.com/characters/?fields=*&limit=10');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Mashape-Key: vkzI8QqlJZmshhYlpahmL5dCVbj1p1xlDgKjsnJKZqd1tq2dXT', 'Accept: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

// If using JSON...
        $data = json_decode($response);
//        dump($data);die();


//        curl --get --include 'https://igdbcom-internet-game-database-v1.p.mashape.com/characters/?fields=*&limit=10' \
//    --header 'X-Mashape-Key: vkzI8QqlJZmshhYlpahmL5dCVbj1p1xlDgKjsnJKZqd1tq2dXT' \
//    --header 'Accept: application/json'


//        $request = Request::create(
//            'https://igdbcom-internet-game-database-v1.p.mashape.com/characters/?fields=*&limit=10',
//            'GET',
//            array(
//                "X-Mashape-Key" => "vkzI8QqlJZmshhYlpahmL5dCVbj1p1xlDgKjsnJKZqd1tq2dXT",
//                "Accept" => "application/json")
//        );
//
////        dump($request);die();
//
//        $content = $request->getContent(); //voir pour la récupération d'une requête
//
////        dump($content);die();

        return $this->render('test/request.html.twig' , array(
//            'content' => $content
            'data' => $data
        ));
    }
}
