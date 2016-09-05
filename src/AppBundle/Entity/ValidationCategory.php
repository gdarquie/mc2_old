<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Validation
 *
 * @ORM\Table(name="validation_category")
 * @ORM\Entity
 */
class ValidationCategory
{
	/**
     * @var integer
     *
     * @ORM\Column(name="validation_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $validationCategoryId;
 	
 	/**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;


}

