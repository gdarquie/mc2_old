<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ValidationCategory
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
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @return int
     */
    public function getValidationCategoryId()
    {
        return $this->validationCategoryId;
    }

    /**
     * @param int $validationCategoryId
     */
    public function setValidationCategoryId($validationCategoryId)
    {
        $this->validationCategoryId = $validationCategoryId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

}




