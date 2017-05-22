<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class PersonController extends Controller
{
    /**
     * @Route("/persons", name = "persons")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT p FROM AppBundle:Person p");
        $persons = $query->getResult();

        return $this->render('AppBundle:person:index.html.twig', array(
            "persons" => $persons
        ));
    }

    /**
     * @Route("/person/{personId}", name = "person")
     */
    public function getOnePerson($personId){

        //Get Person
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT p FROM AppBundle:Person p WHERE p.personId = :person");
        $query->setParameter('person', $personId);
        $person = $query->getSingleResult();

        //Get all numbers for the person
        $query = $em->createQuery("SELECT n FROM AppBundle:Number n JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId);
        $numbers_as_performers = $query->getResult();

        //Get all numbers for the person
        $query = $em->createQuery("SELECT n FROM AppBundle:Number n JOIN n.choregraphers p WHERE p.personId = :person");
        $query->setParameter('person', $personId);
        $numbers_as_choreographers = $query->getResult();

        //Get all numberId for the person (as performers)
        $query = $em->createQuery("SELECT n.numberId FROM AppBundle:Number n JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId);
        $list_numberId = $query->getResult();

        //AVG shot length
        $query = $em->createQuery("SELECT (n.length)/10 FROM AppBundle:Number n JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId);
        $shot_length = $query->getResult();

        //Get all Performances
        $query = $em->createQuery("SELECT COUNT(n) as nb, p.title FROM AppBundle:Number n JOIN n.performance_thesaurus p GROUP BY p.title ");
        $performances = $query->getResult();

        //Get a Performance
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.performance_thesaurus t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ");
        $query->setParameter('person', $personId );
        $performance = $query->getResult();

        //Get all structures
        $query = $em->createQuery("SELECT COUNT(DISTINCT(n.numberId)) as nb, t.title FROM AppBundle:Number n JOIN n.structure t JOIN n.performers p GROUP BY t.title");
        $structures = $query->getResult();

        //Get total of numbers [vérifier]
        $query = $em->createQuery("SELECT COUNT(DISTINCT(n.numberId)) as total FROM AppBundle:Number n JOIN n.structure t JOIN n.performers p");
        $structures_total = $query->getSingleResult();

        //Get ????
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.structure t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ");
        $query->setParameter('person', $personId );
        $structure = $query->getResult();

//        Topics part (genre, general_mood)

        //All genres
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.genre t JOIN n.performers p GROUP BY t.title ORDER BY nb DESC");
        $genres = $query->getResult();

        //Genre for the person
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.genre t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $genre = $query->getResult();

        //All moods
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.general_mood t JOIN n.performers p GROUP BY t.title ORDER BY nb DESC");
        $moods = $query->getResult();

        //Moods for the person
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.general_mood t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $mood = $query->getResult();

//      Exoticism

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.exoticism_thesaurus t JOIN n.performers p GROUP BY t.title ORDER BY nb DESC");
        $exoticisms = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.exoticism_thesaurus t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $exoticism = $query->getResult();

//       Sources

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.source_thesaurus t JOIN n.performers p GROUP BY t.title ORDER BY nb DESC");
        $sources = $query->getResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.source_thesaurus t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $source = $query->getResult();

//      Dancing
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.dancingType t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $dancing = $query->getResult();

//      Musical
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.musical_thesaurus t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $musical = $query->getResult();

//      Completeness ???
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.completenessThesaurus t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $completeness = $query->getResult();

//      Completes ???
        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.completenessThesaurus t JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId );
        $completes = $query->getSingleResult();

//      Complete ???
        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.completenessThesaurus t JOIN n.performers p WHERE p.personId = :person AND t.title = :complete");
        $query->setParameter('person', $personId );
        $query->setParameter('complete', 'complete' );
        $complete = $query->getSingleResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.completOptions t JOIN n.performers p WHERE p.personId = :person AND t.title = :occurences");
        $query->setParameter('person', $personId );
        $query->setParameter('occurences', 'multiple occurrences of a song or partial reprise' );
        $occurences = $query->getSingleResult();

        $query = $em->createQuery("SELECT COUNT(n) as nb FROM AppBundle:Number n JOIN n.completOptions t JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId );
        $completOptions = $query->getSingleResult();

        $query = $em->createQuery("SELECT COUNT(t.title) as nb, t.title FROM AppBundle:Number n JOIN n.diegetic_thesaurus t GROUP BY t.title ORDER BY nb DESC");
        $diegetics = $query->getResult();

        //
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.diegetic_thesaurus t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $diegetic = $query->getResult();

        //
        $query = $em->createQuery("SELECT DISTINCT(f.filmId) as filmId FROM AppBundle:Number n JOIN n.film f JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId );
        $filmsWithPerson = $query->getResult();
////        $filmsWithPerson = [4349,4606,4690,5030];

        //total des durées des numbers pour chaque film avec person (pourquoi HAVING marche pas)
        $query = $em->createQuery("SELECT SUM((n.endTc - n.beginTc)) as total, f.length as length, f.title as title, f.released FROM AppBundle:Film f JOIN f.numbers n WHERE f.filmId IN (:film) GROUP BY f.filmId ORDER BY f.released ASC");
//        $query->setParameter('person', $name );
        $query->setParameter('film', $filmsWithPerson );
        $lengthTotal = $query->getResult();

        $query = $em->createQuery("SELECT SUM((n.endTc - n.beginTc)) as total, f.title as title FROM AppBundle:Number n JOIN n.performers p JOIN n.film f WHERE p.personId = :person  AND f.filmId IN (:film) GROUP BY f.filmId ORDER BY f.released ASC");
        $query->setParameter('person', $personId );
        $query->setParameter('film', $filmsWithPerson );
        $lengthTotalForPerson = $query->getResult();

        if(count($lengthTotalForPerson) == count($lengthTotal)) {

            $ratio = [];
            for ($i = 0; $i < count($lengthTotalForPerson); $i++) {

                array_push($ratio, array("all" => $lengthTotal[$i]['total'], "title" => $lengthTotal[$i]['title'], "length" => $lengthTotal[$i]['length'], "released" => $lengthTotal[$i]['released'], "one" => $lengthTotalForPerson[$i]['total'] ));
            }
        }

        //durée moyenne pour d'un shot pour un number
        $query = $em->createQuery("SELECT DISTINCT(n.numberId), AVG(n.shots) as average FROM AppBundle:Number n JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId );
        $avgShotForPerson = $query->getResult();
        //rapporter par rapport à la durée de plans


        //une moyenne par films
        $query = $em->createQuery("SELECT COUNT(n) as nb, t.title FROM AppBundle:Number n JOIN n.diegetic_thesaurus t JOIN n.performers p WHERE p.personId = :person GROUP BY t.title ORDER BY nb DESC");
        $query->setParameter('person', $personId );
        $presence = $query->getResult();

        //Average length a shot for a performer
        $query = $em->createQuery("SELECT (SUM(n.length))/(SUM(n.shots)) as average FROM AppBundle:Number n JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId);
        $avgLengthShot = $query->getSingleResult();

        //Associated persons (à faire)

        //choreographers
        $query = $em->createQuery("SELECT p.name as name FROM AppBundle:Number n JOIN n.choregraphers p WHERE p.personId = :person GROUP BY p.name");
        $query->setParameter('person', $personId);
        $associated_choreographers = $query->getResult();

        //composers
        $query = $em->createQuery("SELECT n.title as number, s.title as song, c.name as name, c.personId as personId FROM AppBundle:Number n JOIN n.song s JOIN s.composer c JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId);
        $associated_composers = $query->getResult();

        //lyricists
        $query = $em->createQuery("SELECT n.title as number, s.title as song, l.name as name, l.personId as personId FROM AppBundle:Number n JOIN n.song s JOIN s.lyricist l JOIN n.performers p WHERE p.personId = :person");
        $query->setParameter('person', $personId);
        $associated_lyricists = $query->getResult();

        return $this->render('AppBundle:person:person.html.twig', array(
            'person' => $person,
            'numbers_as_performers' => $numbers_as_performers,
            'performances' => $performances,
            'performance' => $performance,
            'structure' => $structure,
            'structures' => $structures,
            'genres' => $genres,
            'genre' => $genre,
            'source' => $source,
            'sources' => $sources,
            'dancing' => $dancing,
            'musical' => $musical,
            'completeness' => $completeness,
            'completes' => $completes,
            'complete' => $complete,
            'occurences' => $occurences,
            'completOptions' => $completOptions,
            'diegetic' => $diegetic,
            'diegetics' => $diegetics,
            'lengthTotal' => $lengthTotal,
            'filmsWithPerson' => $filmsWithPerson,
            'lengthTotalForPerson' =>$lengthTotalForPerson,
            'ratio' => $ratio,
            'structures_total' => $structures_total,
            'avgShotForPerson' => $avgShotForPerson,
            'moods' => $moods,
            'mood' => $mood,
            'exoticisms' => $exoticisms,
            'exoticism' => $exoticism,
            '$list_numberId' => $list_numberId,
            'shot_length' => $shot_length,
            'avgLengthShot' => $avgLengthShot,
            'associated_choreographers' => $associated_choreographers,
            'associated_composers' => $associated_composers,
            'associated_lyricists' => $associated_lyricists
        ));
    }


}
