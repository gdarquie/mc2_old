<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ThesaurusRepository extends EntityRepository
{
	public function findAllOrderdByTitle()
    {
        return $this->createQueryBuilder('thesaurus')
            ->orderBy('thesaurus.title', 'ASC')
            ->getQuery()
        	->execute();
    }

	public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('thesaurus')
            ->orderBy('thesaurus.title', 'ASC');
 
    }

    public function findAllThesaurusByType($code)
    {
        $result = $this->createQueryBuilder('thesaurus')
            ->where('thesaurus.title = :code')
            ->orderBy('thesaurus.title', 'ASC')
            ->setParameter('code', $code);

        return $result;
    }

//    public function findAllThesaurusByTypeAndCategory($type, $category)
//    {
//        return $this->createQueryBuilder('thesaurus')
//            ->where('thesaurus.type = :type')
//            ->andWhere("thesaurus.category = :category")
//            ->orderBy('thesaurus.title', 'ASC')
//            ->setParameters(array( 'type' => $type, 'category' => $category));
//    }
//
//    public function findNumbersForOneId($id){
//        return $this->getEntityManager('SELECT t FOM AppBundle:Thesaurus t JOIN WHERE t.id = :id')->createQuery("")
//            ->setParameter('id', $id)
//            ->getResult();
//    }



}



