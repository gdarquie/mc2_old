<?php
/**
 * Created by PhpStorm.
 * User: gaetan
 * Date: 19/09/2016
 * Time: 11:22
 */

namespace AppBundle\Controller\Editor;

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

            $collection = new \Doctrine\Common\Collections\ArrayCollection();
            $user = $this->getUser();
            $collection->add($user);

            $song->setEditors($collection);

            $now = new \DateTime();
            $song->setDateCreation($now);
            $song->setLastUpdate($now);

            $em->persist($song);
            $em->flush();

            return $this->redirectToRoute('editor');
        }

        return $this->render('editor/song/new.html.twig', array(
            'songForm' => $form->createView()
        ));
    }


    /**
     * @Route("/editor/song/id/{songId}/edit" , name = "song_edit")
     */
    public function songEditAction(Request $request, $songId){

        $em = $this->getDoctrine()->getManager();
        $song = $em->getRepository('AppBundle:song')->findOneBysongId($songId);

        $form = $this->createForm(songType::class, $song);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $collection = new \Doctrine\Common\Collections\ArrayCollection();
            $user = $this->getUser();
            $collection->add($user);
            $song->setEditors($collection);

            $now = new \DateTime();
            $song->setLastUpdate($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($song);
            $em->flush();
        }

        return $this->render('editor/song/edit.html.twig', array(
            'song' => $song,
            'songForm' => $form->createView()
        ));
    }


}



