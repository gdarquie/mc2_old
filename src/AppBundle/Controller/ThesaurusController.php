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
     * @Route("/thesaurus", name="thesaurus")
     */
    public function thesaurusAction()
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c FROM AppBundle:Code c ORDER BY c.title ASC');
        $codes = $query->getResult();

        return $this->render(
            'AppBundle:thesaurus:accueil.html.twig', array(
                'codes' => $codes
            ));
        
    }

    /**
     * @Route("/thesaurus/type={content}", name="thesaurus_type")
     */
    public function codeAction($content)
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c FROM AppBundle:Code c WHERE c.content = :content');
        $query->setParameter('content', $content);
        $code = $query->getSingleResult();

        $query = $em->createQuery('SELECT c.codeId FROM AppBundle:Code c WHERE c.content = :content');
        $query->setParameter('content', $content);
        $codeId = $query->getSingleResult();
        $codeId = $codeId['codeId'];



        $query = $em->createQuery('SELECT t FROM AppBundle:Thesaurus t INNER JOIN t.code c WHERE c.codeId = :codeId');
        $query->setParameter('codeId', $codeId);
        $thesaurus = $query->getResult();

        return $this->render('AppBundle:thesaurus:code.html.twig', array(
            'code' => $code,
            'thesaurus' => $thesaurus
        ));
    }

    /**
     * @Route("/thesaurus/id={id}", name="thesaurus_element")
     */
    public function elementThesaurusAction($id)
    {

        //les opérations sont construites à partir de 'code'

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT t FROM AppBundle:Thesaurus t WHERE t.id = :id');
        $query->setParameter('id', $id);
        $thesaurus = $query->getSingleResult();

        //Select code de l'id lié
        $query = $em->createQuery('SELECT c.content FROM AppBundle:Thesaurus t JOIN t.code c WHERE t.id = :id');
        $query->setParameter('id', $id);
        $code = $query->getSingleResult();
        $code = $code['content'];

        $numbers = "";
        $films = "";
        $songs = "";
        $stagenumbers = "";


        if($code == "adaptation"){
            //Select toutes les songs avec ce code
            $query = $em->createQuery('SELECT f FROM AppBundle:Film f JOIN f.'.$code.' t WHERE t.id = :id');
            $query->setParameter('id', $id);
            $films = $query->getResult();
        }

        else if($code == "songtype"){
            $query = $em->createQuery('SELECT s FROM AppBundle:Song s JOIN s.'.$code.' t WHERE t.id = :id');
            $query->setParameter('id', $id);
            $songs = $query->getResult();
        }

        else{

            //et les stage numbers
            if($code == "musicals" OR $code == "costumes" OR $code == "dancemble" OR $code == "musensemble" OR $code == "cast" OR $code == "dancing_type" OR $code == "dance_subgenre" OR $code == "dance_content" OR $code == "genre" OR $code == "general_mood"){

                $query = $em->createQuery('SELECT n FROM AppBundle:Stagenumber n JOIN n.'.$code.' t WHERE t.id = :id');
                $query->setParameter('id', $id);
                $stagenumbers = $query->getResult();

            }

            //Select tous les numbers avec ce code (dans tous les cas)
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.'.$code.' t WHERE t.id = :id');
            $query->setParameter('id', $id);
            $numbers = $query->getResult();

        }

        return $this->render('AppBundle:thesaurus:item.html.twig', array(
            'thesaurus' => $thesaurus,
            'numbers' => $numbers,
            'films' => $films,
            'songs' => $songs,
            'stagenumbers' => $stagenumbers
        ));

    }



   //supprimer le reste?


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
        $query = $em -> createQuery('SELECT t.title as title, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type AND t.id != 436 GROUP BY t.id ORDER BY nb DESC');
        $query->setParameter('type', 'exoticism');
        $popularexoticism = $query->getResult();

        //all most popular exoticism in numbers
        $query = $em -> createQuery('SELECT t.title as title, COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type AND t.id != 436 GROUP BY t.id ORDER BY title');
        $query->setParameter('type', 'exoticism');
        $popularexoticismCartouche = $query->getResult();

        $query = $em -> createQuery('SELECT t.title as label, COUNT(t.title) as value FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type GROUP BY t.id ORDER BY value DESC');
        $query->setParameter('type', 'exoticism');
        $popularexoticismJson = $query->getResult();
        $popularexoticismJson = new JsonResponse($popularexoticismJson);



        //the most popular
        $query = $em -> createQuery('SELECT t.title as title,  COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type GROUP BY t.id ORDER BY nb DESC')->setMaxResults(1);
        $query->setParameter('type', 'exoticism');
        $mostPopular = $query->getSingleResult();

        //total of cited exoticism
        $query = $em -> createQuery('SELECT COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type AND t.id != 436');
        $query->setParameter('type', 'exoticism');
        $total = $query->getSingleResult();

        //total of number with exoticism
        $query = $em -> createQuery('SELECT COUNT(DISTINCT(n.id)) as nb FROM AppBundle:Number n JOIN n.exoticism_thesaurus t WHERE t.type = :type AND t.id != 436 ');
        $query->setParameter('type', 'exoticism');
        $totalNumber = $query->getSingleResult();

        //number of exoticism group by decades

        return $this->render('web/thesaurus/exoticism.html.twig' , array(
            'exoticism' => $exoticism,
            'popularexoticism' => $popularexoticism,
            'popularexoticismCartouche' => $popularexoticismCartouche,
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
        $query = $em -> createQuery('SELECT t.id as itemId, t.title as title, COUNT(t.title) as nb, t.category as category FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category GROUP BY t.id ORDER BY nb DESC');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'general');
        $popularmood = $query->getResult();

        $query = $em -> createQuery('SELECT t.id as itemId, t.title as title, COUNT(t.title) as nb, t.category as category FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category GROUP BY t.id ORDER BY title');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'general');
        $popularmoodCartouche = $query->getResult();

        //the most popular
        $query = $em -> createQuery('SELECT t.title as title,  COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category GROUP BY t.id ORDER BY nb DESC')->setMaxResults(1);
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
        $query = $em -> createQuery('SELECT t.id as itemId, t.title as title, COUNT(t.title) as nb, t.category as category FROM AppBundle:Number n JOIN n.genre t WHERE t.type = :type AND t.category = :category GROUP BY t.id ORDER BY nb DESC');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'genre');
        $popularmoodGenre = $query->getResult();


        //all most popular exoticism in numbers
        $query = $em -> createQuery('SELECT t.id as itemId, t.title as title, COUNT(t.title) as nb, t.category as category FROM AppBundle:Number n JOIN n.genre t WHERE t.type = :type AND t.category = :category GROUP BY t.id ORDER BY title');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', 'genre');
        $popularmoodGenreCartouche = $query->getResult();

        //the most popular
        $query = $em -> createQuery('SELECT t.title as title,  COUNT(t.title) as nb FROM AppBundle:Number n JOIN n.general_mood t WHERE t.type = :type AND t.category = :category GROUP BY t.id ORDER BY nb DESC')->setMaxResults(1);
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
            'popularmoodCartouche' => $popularmoodCartouche,
            'mostPopular' => $mostPopular,
            'total' => $total,
            'totalNumber' => $totalNumber,
            'moodGenre' => $moodGenre,
            'popularmoodGenre' => $popularmoodGenre,
            'popularmoodGenreCartouche' => $popularmoodGenreCartouche,
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
        $query = $em -> createQuery('SELECT e FROM AppBundle:Thesaurus e WHERE e.type = :type AND e.id = :item AND e.category = :category');
        $query->setParameter('type', 'mood');
        $query->setParameter('category', $category);
        $query->setParameter('item', $itemId);
        $mood = $query->getResult();

        //list of numbers for 1 mood
        if (strtoupper($category) == strtoupper("General")) {
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.general_mood g JOIN n.film f WHERE g.type = :type AND g.id = :item ORDER by f.filmId');
        }
        else if(strtoupper($category) == strtoupper("genre")){
            $query = $em->createQuery('SELECT n FROM AppBundle:Number n JOIN n.genre g JOIN n.film f WHERE g.type = :type AND g.id = :item ORDER by f.filmId');
        }
        $query->setParameter('type', 'mood');
        $query->setParameter('item', $itemId);
        $numbers = $query->getResult();
//
        //list of films for 1 exoticism
        if (strtoupper($category) == strtoupper("general")){
            $query = $em -> createQuery('SELECT f.title as filmTitle, f.filmId as filmId, f.idImdb as imdb, COUNT(n.id) as nb FROM AppBundle:Number n JOIN n.general_mood e JOIN n.film f  WHERE e.type = :type AND e.id = :item GROUP BY f.filmId');
        }
        else if(strtoupper($category) == strtoupper("genre")){
            $query = $em -> createQuery('SELECT f.title as filmTitle, f.filmId as filmId, f.idImdb as imdb, COUNT(n.id) as nb FROM AppBundle:Number n JOIN n.genre e JOIN n.film f  WHERE e.type = :type AND e.id = :item GROUP BY f.filmId');
        }
        $query->setParameter('type', 'mood');
        $query->setParameter('item', $itemId);
        $films = $query->getResult();


        if (strtoupper($category) == strtoupper("general")){
            $query = $em -> createQuery('SELECT n.source as label, count(n.id) as value FROM AppBundle:Number n JOIN n.general_mood e WHERE e.type = :type AND e.id = :item GROUP BY label ORDER BY value desc');
        }
        else if(strtoupper($category) == strtoupper("genre")){
            $query = $em -> createQuery('SELECT n.source as label, count(n.id) as value FROM AppBundle:Number n JOIN n.genre e WHERE e.type = :type AND e.id = :item GROUP BY label ORDER BY value desc');
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
