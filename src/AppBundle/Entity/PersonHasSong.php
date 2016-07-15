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
     * @var \AppBundle\Entity\Person
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="person_id")
     * })
     */
    private $person;



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
     * Set person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return PersonHasSong
     */
    public function setPerson(\AppBundle\Entity\Person $person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \AppBundle\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }
}
