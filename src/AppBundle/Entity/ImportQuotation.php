<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImportQuotation
 *
 * @ORM\Table(name="import_quotation")
 * @ORM\Entity
 */
class ImportQuotation
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
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="external", type="text", length=65535, nullable=true)
     */
    private $external;

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
     * @return ImportQuotation
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
     * @return ImportQuotation
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
     * Set title
     *
     * @param string $title
     *
     * @return ImportQuotation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set external
     *
     * @param string $external
     *
     * @return ImportQuotation
     */
    public function setExternal($external)
    {
        $this->external = $external;

        return $this;
    }

    /**
     * Get external
     *
     * @return string
     */
    public function getExternal()
    {
        return $this->external;
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
