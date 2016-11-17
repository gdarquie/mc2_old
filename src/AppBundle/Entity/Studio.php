<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Studio
 *
 * @ORM\Table(name="studio")
 * @ORM\Entity
 */
class Studio
{

    /**
     * @var integer
     *
     * @ORM\Column(name="studio_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $studioId;


    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @return int
     */
    public function getStudioId()
    {
        return $this->studioId;
    }

    /**
     * @param int $studioId
     */
    public function setStudioId($studioId)
    {
        $this->studioId = $studioId;
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
