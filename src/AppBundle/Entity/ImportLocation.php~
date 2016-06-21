<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImportLocation
 *
 * @ORM\Table(name="import_location")
 * @ORM\Entity
 */
class ImportLocation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="film", type="integer", nullable=true)
     */
    private $film;

    /**
     * @var integer
     *
     * @ORM\Column(name="timecode", type="integer", nullable=true)
     */
    private $timecode;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set film
     *
     * @param integer $film
     *
     * @return ImportLocation
     */
    public function setFilm($film)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return integer
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set timecode
     *
     * @param integer $timecode
     *
     * @return ImportLocation
     */
    public function setTimecode($timecode)
    {
        $this->timecode = $timecode;

        return $this;
    }

    /**
     * Get timecode
     *
     * @return integer
     */
    public function getTimecode()
    {
        return $this->timecode;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return ImportLocation
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
