<?php
/**
 * Created by PhpStorm.
 * User: gaetan
 * Date: 19/09/2016
 * Time: 11:22
 */

namespace AppBundle\Controller\Editeur;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Song;
use AppBundle\Form\SongType;

class SongController extends Controller
{
    /**
     * @Route("/editor/song/add/new", name="editorNewSong")
     */
    public function addAction(Request $request){

        $song = new Song();

        $form = $this->createForm(SongType::class, $song);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($song);
            $em->flush();

            return $this->redirectToRoute('editor');
        }

        return $this->render('editor/song/new.html.twig', array(
            'songForm' => $form->createView()
        ));
    }


}



