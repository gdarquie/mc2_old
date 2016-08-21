<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


use AppBundle\Entity\Film;
use AppBundle\Entity\Person;
use AppBundle\Entity\Number;
use AppBundle\Entity\Thesaurus;

use AppBundle\Form\NumberType;
use AppBundle\Form\ThesaurusType;



class EditorController extends Controller
{

//Films

    /**
     * @Route("/editor", name="editor")
     */
    public function editorAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        //all films
        $films = $em->getRepository('AppBundle:Film')->findAll(); 

        //Films with number
        $query = $em->createQuery(
            'SELECT f.filmId as filmId, f.title as title, f.released as released  FROM AppBundle:Film f WHERE f.filmId IN (SELECT IDENTITY(n.film) FROM AppBundle:Number n WHERE n.film != 0)'
            );  
        $filmsWithNumber = $query->getResult();

        //All Persons
        $persons = $em->getRepository('AppBundle:Person')->findAll();
        
        return $this->render('editor/index.html.twig', array(
            'films' => $films,
            'filmsWithNumber' => $filmsWithNumber,
            'persons' => $persons,
        ));
    }


    //Tous les numbers d'un film

    /**
     * @Route("/editor/film/{film}", name="editorFilm")
     */
    public function editorFilmAction($film)
    {
        $em = $this->getDoctrine()->getManager();

        //les infos du film
        $film = $em->getRepository('AppBundle:Film')->findOneByFilmId($film);

        //tous les numbers du film
	    $query = $em->createQuery(
	        'SELECT  (n.numberId) as id, (n.title) as title, (n.film) as film, (n.beginTc) as beginTc, (n.endTc) as endTc, (n.length) as length FROM AppBundle:Number n WHERE n.film = :film ORDER BY n.beginTc' 
	        ); 
	    $query->setParameter('film', $film);
	    $numbersOf1Film = $query->getResult(); 

	    //moyenne des number pour le film
        $query = $em->createQuery(
            'SELECT SUM(f.length) / COUNT(f.title) as average FROM AppBundle:Number f WHERE f.film = :film'
            ); 
        $query->setParameter('film', $film);
        $numberAverageLength = $query->getResult();

        //moyenne des number pour tous les films
        $query = $em->createQuery(
            'SELECT SUM(f.length) / COUNT(f.title) as average FROM AppBundle:Number f'
            ); 
        $numbersAverageLength = $query->getResult();

        //addition de tous les numbers pour le film
         $query = $em->createQuery(
            'SELECT SUM(n.length) as total, (f.length) as length FROM AppBundle:Number n JOIN n.film f WHERE n.film = :film'
            ); 
        $query->setParameter('film', $film);
        $numberSumLength = $query->getResult();

        //persons linked to a movie
        $query = $em->createQuery(
            'SELECT a.personId as personId FROM AppBundle:FilmHasPerson a WHERE a.filmId = :film' //film has person
            ); //SELECT p.name FROM AppBundle:Person p WHERE p.personId IN ()
        $query->setParameter('film', $film);
        $persons1Film = $query->getResult();

        // //Length
        // $query = $em->createQuery('SELECT l FROM AppBundle:Length l WHERE l.number = :number');
        // $query->setParameter('number', $number);
        // $length = $query->getResult();

        //All Persons
        $persons = $em->getRepository('AppBundle:Person')->findAll();

        //All Professions
        $professions = $em->getRepository('AppBundle:Profession')->findAll();

        //All Numbers
        $numbers = $em->getRepository('AppBundle:Number')->findAll();


	    //faire une viz avec la chronologie des numbers

        //voir tous les numbers d'un film (lien pour modifier le number) + ajouter un number
        
        return $this->render('editor/film.html.twig', array(
            'film' => $film,
            'numbers' => $numbers,
            'numbersOf1Film' => $numbersOf1Film,
            'numberAverageLength' => $numberAverageLength,
            'numbersAverageLength' => $numbersAverageLength,
            'numberSumLength' => $numberSumLength,
            'persons' => $persons,
            'professions' => $professions,
            'persons1Film' => $persons1Film,
        ));

        //conversion en timecode : echo gmdate("H:i:s", 685);

    }


//Number

    /**
    * @Route("/editor/number/id/{numberId}/edit" , name = "number_edit")
    */
    public function numberEditAction(Request $request, $numberId){

        $em = $this->getDoctrine()->getManager();
        $number = $em->getRepository('AppBundle:Number')->findOneByNumberId($numberId);

        $form = $this->createForm(NumberType::class, $number);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            // dump($form->getData());die;
            $number = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($number);
            $em->flush();
        }

        return $this->render('editor/number/edit.html.twig', array(
            'number' => $number,
            'numberForm' => $form->createView()
            ));
    }

 
    //Modifier/supprimer après avoir ajouté number_edit - ce n'est pas une fonction d'edit du number
    /**
     * @Route("/editor/test/number/{number}", name="editorNumberTest")
     */
    public function editorNumberAction(Request $request, $number)
    {
        $em = $this->getDoctrine()->getManager();

        // $film = $em->getRepository('AppBundle:Film')->findOneByFilmId($film);
        
        $number = $em->getRepository('AppBundle:Number')->findOneByNumberId($number); //voir un number d'un film + edit le number

        //formulaire Number (ne fonctionne pas pour l'instant)

        $form = $this->createForm(NumberType::class, $number);
        $form->handleRequest($request);


        //All structures of a number
        $query = $em->createQuery(
            'SELECT t.title as structure, i.validationId as validation FROM AppBundle:Item i JOIN i.structure n JOIN i.thesaurus t WHERE n.numberId = :number '
            ); 
        $query->setParameter('number', $number);
        $structuresNumber = $query->getResult();

        //Length
        // $query = $em->createQuery('SELECT l FROM AppBundle:Length l WHERE l.number = :number');
        // $query->setParameter('number', $number);
        // $length = $query->getResult();


        return $this->render('editor/number.html.twig', array(
            'number' => $number,
            // 'length' => $length,
            'structuresNumber' => $structuresNumber,
            'form' => $form->createView()

        ));
    }

//Structure of 1 number

    /**
     * @Route("/editor/number/{number}/structure/new", name="numberStructureNew")
     */
    public function numberStructureNewAction(Request $request, $number){
        $em = $this->getDoctrine()->getManager();

        $number = $em->getRepository('AppBundle:Number')->findOneByNumberId($number);

        $query = $em->createQuery('SELECT t.title FROM AppBundle:Thesaurus t WHERE t.type = :type');
        $query->setParameter('type', "structure");
        $structures = $query->getResult();
       

        $thesaurus = new Thesaurus();
        $form = $this->createForm('AppBundle\Form\ThesaurusType', $thesaurus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('numberStructureNew', array('id' => $thesaurus->getThesaurusId()));
            // à reprendre
        }

        return $this->render('editor/structure/new.html.twig', array(
            'thesaurus' => $thesaurus,
            'structures' => $structures,
            'number' => $number,
            'form' => $form->createView(),
        ));

    }


//Le thesaurus
    /**
     * @Route("/editor/thesaurus/{type}", name="editorThesaurus")
     */
    public function thesaurusEditorAction($type){

        $em = $this->getDoctrine()->getManager();

        if($type == "all")
        {
            $thesaurus = $em->getRepository('AppBundle:Thesaurus')->findAll();
        }
        else{
            $query = $em->createQuery('SELECT t FROM AppBundle:Thesaurus t WHERE t.type = :type');
            $query->setParameter('type', $type);
            $thesaurus = $query->getResult();
        }

        $query = $em->createQuery('SELECT t FROM AppBundle:Thesaurus t GROUP BY t.type');
        $thesaurusType = $query->getResult();

        //compter le nombre d'item pour chaque thesaurus ???


        return $this->render('editor/thesaurus.html.twig', array(
            'thesaurus' => $thesaurus,
            'thesaurusType' => $thesaurusType
            ));


    }

    //Update Thesaurus

    /**
     * @Route("/editor/thesaurus/edit/{thesaurusId}", name="editorUpdateThesaurus") 
     */
    public function updateAction(Request $request, $thesaurusId)
    {
        $em = $this->getDoctrine()->getManager();
        $thesaurus = $em->getRepository('AppBundle:Thesaurus')->find($thesaurusId);


        if (!$thesaurus) {
            throw $this->createNotFoundException(
                'No item found for id '
            );
        }

 
        $form = $this->createForm(ThesaurusType::class, $thesaurus);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('editorThesaurus', array('type' => $thesaurus->getType() ));
        }

        return $this->render('editor/thesaurusNew.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    //Nouveau item pour thesaurus

    /**
     * @Route("/editor/thesaurus/add/new", name="editorNewThesaurus")
     */
    public function addThesaurusEditorAction(Request $request){

        $thesaurus = new Thesaurus();

        $form = $this->createForm(ThesaurusType::class, $thesaurus);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('editorThesaurus', array('type' => 'all' ));
        }
  

        return $this->render('editor/thesaurusNew.html.twig', array(
            'form' => $form->createView(),
        ));

    }
    


}