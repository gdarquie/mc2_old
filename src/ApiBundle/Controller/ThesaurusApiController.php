<?php

namespace ApiBundle\Controller;

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

    /**
     * @Route("/completeness")
     */
    public function completenessAction(){

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT t.title as title, COUNT(n.numberId) as nb FROM AppBundle:Number n JOIN n.completenessThesaurus t GROUP BY t.thesaurusId');
        $thesaurus = $query->getResult();
        dump($thesaurus);die;

        $response = new JsonResponse($thesaurus, 200);
        return $response;
    }

    /**
     * @Route("/completeness/person/{personId}")
     */
    public function completenessForPersonAction($personId){

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT t.title as title, COUNT(n.numberId) as nb FROM AppBundle:Number n JOIN n.completenessThesaurus t JOIN n.performers p WHERE p.personId = :personId GROUP BY t.thesaurusId');
        $query->setParameter('personId', $personId);
        $thesaurus = $query->getResult();
        dump($thesaurus);die;

        $response = new JsonResponse($thesaurus, 200);
        return $response;
    }


}
