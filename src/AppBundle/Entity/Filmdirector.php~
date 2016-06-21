<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmdirector
 *
 * @ORM\Table(name="filmDirector")
 * @ORM\Entity
 */
class Filmdirector
{
    /**
     * @var string
     *
     * @ORM\Column(name="film", type="string", length=500, nullable=true)
     */
    private $film;

    /**
     * @var string
     *
     * @ORM\Column(name="imdb", type="string", length=255, nullable=true)
     */
    private $imdb;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=500, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="person_id", type="integer", nullable=true)
     */
    private $personId;

    /**
     * @var integer
     *
     * @ORM\Column(name="film_id", type="integer", nullable=true)
     */
    private $filmId;

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
     * @param string $film
     *
     * @return Filmdirector
     */
    public function setFilm($film)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return string
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set imdb
     *
     * @param string $imdb
     *
     * @return Filmdirector
     */
    public function setImdb($imdb)
    {
        $this->imdb = $imdb;

        return $this;
    }

    /**
     * Get imdb
     *
     * @return string
     */
    public function getImdb()
    {
        return $this->imdb;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Filmdirector
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set personId
     *
     * @param integer $personId
     *
     * @return Filmdirector
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;

        return $this;
    }

    /**
     * Get personId
     *
     * @return integer
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * Set filmId
     *
     * @param integer $filmId
     *
     * @return Filmdirector
     */
    public function setFilmId($filmId)
    {
        $this->filmId = $filmId;

        return $this;
    }

    /**
     * Get filmId
     *
     * @return integer
     */
    public function getFilmId()
    {
        return $this->filmId;
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
