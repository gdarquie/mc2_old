<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Thesaurus;
use AppBundle\Form\ThesaurusType;

class ThesaurusController extends Controller
{

    /**
     * @Route("/thesaurus/{type}", name="thesaurus")
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


        return $this->render('web/thesaurus/thesaurus.html.twig', array(
            'thesaurus' => $thesaurus,
            'thesaurusType' => $thesaurusType
        ));


    }


    /**
     * @Route("/thesaurus/item/{thesaurusId}", name="getOneThesaurus")
     */
    public function getOneThesaurus($thesaurusId){
        $em = $this->getDoctrine()->getManager();

        $query = $em -> createQuery('SELECT t FROM AppBundle:Thesaurus t WHERE t.thesaurusId = :thesaurusId');
        $query->setParameter('thesaurusId', $thesaurusId);
        $thesaurus = $query->getSingleResult();


        return $this->render('web/thesaurus/item.html.twig', array(
            'thesaurus' => $thesaurus,
        ));


    }

    //Update Thesaurus

    /**
     * @Route("/thesaurus/edit/{thesaurusId}", name="updateThesaurus")
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

            return $this->redirectToRoute('thesaurus', array('type' => $thesaurus->getType() ));
        }

        return $this->render('web/thesaurus/thesaurusNew.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    //Nouveau item pour thesaurus

    /**
     * @Route("/thesaurus/add/new", name="newThesaurus")
     */
    public function addThesaurusEditorAction(Request $request){

        $thesaurus = new Thesaurus();

        $form = $this->createForm(ThesaurusType::class, $thesaurus);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($thesaurus);
            $em->flush();

            return $this->redirectToRoute('thesaurus', array('type' => 'all' ));
        }


        return $this->render('web/thesaurus/thesaurusNew.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/thesaurus/type/{type}/item/{item}", name="getItemTypeThesaurus")
     */
    public function getNumbersFromItemTypeThesaurus($type, $item){

        $em = $this->getDoctrine()->getManager();

        if($type == 'costumes'){
            $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n INNER JOIN n.costumes c WHERE c.type = :type AND c.title = :item');
        }
        else if($type == 'exoticism'){
            $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n INNER JOIN n.exoticism_thesaurus c WHERE c.type = :type AND c.title = :item');
        }

        //ajouter une catégorie facultative
//        else if($type == 'mood'){
//            $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n INNER JOIN n.general_mood c WHERE c.type = :type AND c.title = :item');
//        }
//        else if($type =='mood'){
//                $query = $em->createQuery('SELECT n.title FROM AppBundle:Number n INNER JOIN n.genre c WHERE c.type = :type AND c.title = :item');
//        }

        //continuer avec les autres types

        $query->setParameter('type', $type);
        $query->setParameter('item', $item);
        $thesaurus = $query->getResult();

        return $this->render('web/thesaurus/numbersFromItem.html.twig', array(
            'thesaurus' => $thesaurus,
        ));

    }


    /**
     * @Route("/exoticism", name="getExoticism")
     */
    public function getExoticism(){

        $em = $this -> getDoctrine()->getManager();

        //all exoticism
        $query = $em -> createQuery('SELECT e FROM AppBundle:Thesaurus e WHERE e.type = :type');
        $query->setParameter('type', 'exoticism');
        $exoticism = $query->getResult();

        //all most popular exoticism in numbers
        $query = $em -> createQuery('SELECT t.title as title, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type AND t.thesaurusId != 436 GROUP BY t.thesaurusId ORDER BY nb DESC');
        $query->setParameter('type', 'exoticism');
        $popularexoticism = $query->getResult();

        $query = $em -> createQuery('SELECT t.title as label, COUNT(t.title) as value FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type GROUP BY t.thesaurusId ORDER BY value DESC');
        $query->setParameter('type', 'exoticism');
        $popularexoticismJson = $query->getResult();
        $popularexoticismJson = new JsonResponse($popularexoticismJson);



        //the most popular
        $query = $em -> createQuery('SELECT t.title as title,  COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type GROUP BY t.thesaurusId ORDER BY nb DESC')->setMaxResults(1);
        $query->setParameter('type', 'exoticism');
        $mostPopular = $query->getSingleResult();

        //total of cited exoticism
        $query = $em -> createQuery('SELECT COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type AND t.thesaurusId != 436');
        $query->setParameter('type', 'exoticism');
        $total = $query->getSingleResult();

        //total of number with exoticism
        $query = $em -> createQuery('SELECT COUNT(DISTINCT(n.id)) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type AND t.thesaurusId != 436 ');
        $query->setParameter('type', 'exoticism');
        $totalNumber = $query->getSingleResult();

        //number of exoticism group by decades

        return $this->render('web/thesaurus/exoticism.html.twig' , array(
            'exoticism' => $exoticism,
            'popularexoticism' => $popularexoticism,
            'popularexoticismJson' => $popularexoticismJson,
            'mostPopular' => $mostPopular,
            'total' => $total,
            'totalNumber' => $totalNumber
        ));

    }

    /**
     * @Route("/exoticism/{item}", name="getOneExoticism")
     */
    public function getOneExoticism($item){

        $em = $this -> getDoctrine()->getManager();

        //1 exoticism
        $query = $em -> createQuery('SELECT e FROM AppBundle:Thesaurus e WHERE e.type = :type AND e.title = :item');
        $query->setParameter('type', 'exoticism');
        $query->setParameter('item', $item);
        $exoticism = $query->getResult();

        //list of numbers for 1 exoticism
        $query = $em -> createQuery('SELECT n.title as title, f.title as filmTitle, n.id as id, f.released as released FROM AppBundle:Number n JOIN n.exoticism_thesaurus e JOIN n.film f WHERE e.type = :type AND e.title = :item ORDER by f.filmId');
        $query->setParameter('type', 'exoticism');
        $query->setParameter('item', $item);
        $numbers = $query->getResult();

        $query = $em -> createQuery('SELECT n FROM AppBundle:Number n JOIN n.exoticism_thesaurus e WHERE e.type = :type AND e.title = :item ORDER by n.id');
        $query->setParameter('type', 'exoticism');
        $query->setParameter('item', $item);
        $numbersTotal = $query->getResult();



        //list of films for 1 exoticism
        $query = $em -> createQuery('SELECT f.title as filmTitle, f.filmId as filmId, f.idImdb as imdb, COUNT(n.id) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus e JOIN n.film f  WHERE e.type = :type AND e.title = :item GROUP BY f.filmId');
        $query->setParameter('type', 'exoticism');
        $query->setParameter('item', $item);
        $films = $query->getResult();


        //number of exoticism by year
        $query = $em -> createQuery('SELECT e.title, f.released as released, COUNT(n.id) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus e JOIN n.film f  WHERE e.type = :type AND e.title = :item GROUP BY f.released ORDER BY f.released ASC');
        $query->setParameter('type', 'exoticism');
        $query->setParameter('item', $item);
        $exoticismByYear = $query->getResult();

        $query = $em -> createQuery('SELECT s.title as title, COUNT(n.id) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus e JOIN n.film f JOIN f.studios s WHERE e.type = :type AND e.title = :item GROUP BY s.studioId ORDER BY nb DESC');
        $query->setParameter('type', 'exoticism');
        $query->setParameter('item', $item);
        $studios = $query->getResult();


        return $this->render('web/thesaurus/oneexoticism.html.twig' , array(
            'exoticism' => $exoticism,
            'numbers' => $numbers,
            'numbersTotal' => $numbersTotal,
            'films' => $films,
            'exoticismByYear' => $exoticismByYear,
            'studios' => $studios
        ));

    }


    /**
     * @Route("/mood", name="getMood")
     */
    public function getMood(){

        $em = $this -> getDoctrine()->getManager();

        //general Mood

        //all mood
        $query = $em -> createQuery('SELECT e FROM AppBundle:Thesaurus e WHERE e.type = :type AND e.category = :category');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'general');
        $mood = $query->getResult();

        //all most popular exoticism in numbers
        $query = $em -> createQuery('SELECT t.thesaurusId as itemId, t.title as title, COUNT(t.title) as nb, t.category as category FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'general');
        $popularmood = $query->getResult();

        //the most popular
        $query = $em -> createQuery('SELECT t.title as title,  COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC')->setMaxResults(1);
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'general');
        $mostPopular = $query->getSingleResult();

        //total of cited exoticism
        $query = $em -> createQuery('SELECT COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category ');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'general');
        $total = $query->getSingleResult();

        //total of number with exoticism
        $query = $em -> createQuery('SELECT COUNT(DISTINCT(n.id)) as nb FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'general');
        $totalNumber = $query->getSingleResult();

        //genre

        //all mood
        $query = $em -> createQuery('SELECT e FROM AppBundle:Thesaurus e WHERE e.type = :type AND e.category = :category');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'genre');
        $moodGenre = $query->getResult();

        //all most popular exoticism in numbers
        $query = $em -> createQuery('SELECT t.thesaurusId as itemId, t.title as title, COUNT(t.title) as nb, t.category as category FROM AppBundle:Number n JOIN n.genre t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'genre');
        $popularmoodGenre = $query->getResult();

        //the most popular
        $query = $em -> createQuery('SELECT t.title as title,  COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category GROUP BY t.thesaurusId ORDER BY nb DESC')->setMaxResults(1);
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'genre');
        $mostPopularGenre = $query->getSingleResult();

        //total of cited exoticism
        $query = $em -> createQuery('SELECT COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.genre t WHERE t.type = :type AND t.category = :category ');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'genre');
        $totalGenre = $query->getSingleResult();

        //total of number with exoticism
        $query = $em -> createQuery('SELECT COUNT(DISTINCT(n.id)) as nb FROM AppBundle:Number n JOIN n.genre t WHERE t.type = :type AND t.category = :category');

        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'genre');
        $totalNumberGenre = $query->getSingleResult();


        return $this->render('web/thesaurus/mood.html.twig' , array(
            'mood' => $mood,
            'popularmood' => $popularmood,
            'mostPopular' => $mostPopular,
            'total' => $total,
            'totalNumber' => $totalNumber,
            'moodGenre' => $moodGenre,
            'popularmoodGenre' => $popularmoodGenre,
            'mostPopularGenre' => $mostPopularGenre,
            'totalGenre' => $totalGenre,
            'totalNumberGenre' => $totalNumberGenre
        ));

    }

    /**
     * @Route("/mood/{category}/{itemId}", name="getOneMood")
     */
    public function getOneMood($itemId, $category){

        $em = $this -> getDoctrine()->getManager();

        //1 exoticism
        $query = $em -> createQuery('SELECT e FROM AppBundle:Thesaurus e WHERE e.type = :type AND e.thesaurusId = :item AND e.category = :category');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', $category);
        $query->setParameter('item', $itemId);
        $mood = $query->getResult();

        //list of numbers for 1 mood
        if (strtoupper($category) == strtoupper("General")) {
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.general_mood g JOIN n.film f WHERE g.type = :type AND g.thesaurusId = :item ORDER by f.filmId');
        }
        else if(strtoupper($category) == strtoupper("genre")){
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.genre g JOIN n.film f WHERE g.type = :type AND g.thesaurusId = :item ORDER by f.filmId');
        }
        $query->setParameter('type', 'mood');
        $query->setParameter('item', $itemId);
        $numbers = $query->getResult();
//
        //list of films for 1 exoticism
        if (strtoupper($category) == strtoupper("general")){
            $query = $em -> createQuery('SELECT f.title as filmTitle, f.filmId as filmId, f.idImdb as imdb, COUNT(n.id) as nb FROM AppBundle:Number n JOIN n.general_mood e JOIN n.film f  WHERE e.type = :type AND e.thesaurusId = :item GROUP BY f.filmId');
        }
        else if(strtoupper($category) == strtoupper("genre")){
            $query = $em -> createQuery('SELECT f.title as filmTitle, f.filmId as filmId, f.idImdb as imdb, COUNT(n.id) as nb FROM AppBundle:Number n JOIN n.genre e JOIN n.film f  WHERE e.type = :type AND e.thesaurusId = :item GROUP BY f.filmId');
        }
        $query->setParameter('type', 'mood');
        $query->setParameter('item', $itemId);
        $films = $query->getResult();


        if (strtoupper($category) == strtoupper("general")){
            $query = $em -> createQuery('SELECT n.source as label, count(n.id) as value FROM AppBundle:Number n JOIN n.general_mood e WHERE e.type = :type AND e.thesaurusId = :item GROUP BY label ORDER BY value desc');
        }
        else if(strtoupper($category) == strtoupper("genre")){
            $query = $em -> createQuery('SELECT n.source as label, count(n.id) as value FROM AppBundle:Number n JOIN n.genre e WHERE e.type = :type AND e.thesaurusId = :item GROUP BY label ORDER BY value desc');
        }
        $query->setParameter('type', 'mood');
        $query->setParameter('item', $itemId);
        $sources = $query->getResult();
        $valNull = 0;
        for ($i=0; $i<count($sources); $i++){
            if ($sources[$i]["label"] === "") {
                $valNull = $sources[$i]["value"];
                array_splice($sources, $i, 1);
            }
        }
        for ($i=0; $i<count($sources); $i++){
            if ($sources[$i]["label"] == NULL) {
                $sources[$i]["value"] += $valNull;
                $sources[$i]["label"] = "NA";
            }
        }
        $sources = new JsonResponse($sources);


//
//
//        //number of exoticism by year
//        $query = $em -> createQuery('SELECT e.title, f.released as released, COUNT(n.id) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus e JOIN n.film f  WHERE e.type = :type AND e.title = :item GROUP BY f.released ORDER BY f.released ASC');
//        $query->setParameter('type', 'exoticism');
//        $query->setParameter('item', $item);
//        $exoticismByYear = $query->getResult();


        return $this->render('web/thesaurus/onemood.html.twig' , array(
            'mood' => $mood,
            'numbers' => $numbers,
            'films' => $films,
            'sources' => $sources
//            'exoticismByYear' => $exoticismByYear
        ));

    }


}
