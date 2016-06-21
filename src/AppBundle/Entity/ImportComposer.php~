<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImportComposer
 *
 * @ORM\Table(name="import_composer")
 * @ORM\Entity
 */
class ImportComposer
{
    /**
     * @var string
     *
     * @ORM\Column(name="song", type="string", length=45, nullable=true)
     */
    private $song;

    /**
     * @var string
     *
     * @ORM\Column(name="person", type="string", length=255, nullable=true)
     */
    private $person;

    /**
     * @var integer
     *
     * @ORM\Column(name="song_id", type="integer", nullable=true)
     */
    private $songId;

    /**
     * @var integer
     *
     * @ORM\Column(name="person_id", type="integer", nullable=true)
     */
    private $personId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set song
     *
     * @param string $song
     *
     * @return ImportComposer
     */
    public function setSong($song)
    {
        $this->song = $song;

        return $this;
    }

    /**
     * Get song
     *
     * @return string
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Set person
     *
     * @param string $person
     *
     * @return ImportComposer
     */
    public function setPerson($person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return string
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set songId
     *
     * @param integer $songId
     *
     * @return ImportComposer
     */
    public function setSongId($songId)
    {
        $this->songId = $songId;

        return $this;
    }

    /**
     * Get songId
     *
     * @return integer
     */
    public function getSongId()
    {
        return $this->songId;
    }

    /**
     * Set personId
     *
     * @param integer $personId
     *
     * @return ImportComposer
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
