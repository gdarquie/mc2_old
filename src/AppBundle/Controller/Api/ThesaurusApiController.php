<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Thesaurus;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("api/thesaurus")
 */
class ThesaurusApiController extends Controller
{

    /**
     * @Route("/")
     */
    public function thesaurusTypeAction(){

        //retourner les titres de tous les films par ordre alphabétique

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT d FROM AppBundle:Thesaurus d');
        $thesauruss = $query->getResult();

        $data = array('thesaurus' => array());
        foreach ($thesauruss as $thesaurus) {
            $data['thesaurus'][] = $this->serializethesaurus($thesaurus);
        }

        $response = new JsonResponse($data, 200);

        return $response;
    }

    private function serializethesaurus(Thesaurus $thesaurus)
    {
        return array(
            'thesaurusId' => $thesaurus->getThesaurusId(),
            'title' => $thesaurus->getTitle(),
            'category' => $thesaurus->getCategory(),
        );
    }

}
