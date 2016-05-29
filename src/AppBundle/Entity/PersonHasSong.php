<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonHasSong
 *
 * @ORM\Table(name="person_has_song", indexes={@ORM\Index(name="fk_person_has_song_song1_idx", columns={"song_id"}), @ORM\Index(name="fk_person_has_song_person1_idx", columns={"person_id"}), @ORM\Index(name="fk_person_has_song_profession1_idx", columns={"profession_id"})})
 * @ORM\Entity
 */
class PersonHasSong
{
    /**
     * @var integer
     *
     * @ORM\Column(name="profession_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $professionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="song_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $songId;

    /**
     * @var integer
     *
     * @ORM\Column(name="person_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $personId;



    /**
     * Set professionId
     *
     * @param integer $professionId
     *
     * @return PersonHasSong
     */
    public function setProfessionId($professionId)
    {
        $this->professionId = $professionId;

        return $this;
    }

    /**
     * Get professionId
     *
     * @return integer
     */
    public function getProfessionId()
    {
        return $this->professionId;
    }

    /**
     * Set songId
     *
     * @param integer $songId
     *
     * @return PersonHasSong
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
     * @return PersonHasSong
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
}
