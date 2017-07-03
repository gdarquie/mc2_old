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

    public function findAllThesaurusByType($type)
    {
        return $this->createQueryBuilder('thesaurus')
            ->where('thesaurus.type = :type')
            ->orderBy('thesaurus.title', 'ASC')
            ->setParameter('type', $type);
    }

    public function findAllThesaurusByTypeAndCategory($type, $category)
    {
        return $this->createQueryBuilder('thesaurus')
            ->where('thesaurus.type = :type')
            ->andWhere("thesaurus.category = :category")
            ->orderBy('thesaurus.title', 'ASC')
            ->setParameters(array( 'type' => $type, 'category' => $category));
    }

    public function findNumbersForOneThesaurusId($thesaurusId){
        return $this->getEntityManager('SELECT t FOM AppBundle:Thesaurus t JOIN WHERE t.thesaurusId = :thesaurusId')->createQuery("")
            ->setParameter('thesaurusId', $thesaurusId)
            ->getResult();
    }



}



