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
     * @var \AppBundle\Entity\Song
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Song")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="song_id", referencedColumnName="song_id")
     * })
     */
    private $song;

    /**
     * @var \AppBundle\Entity\Profession
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Profession")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profession_id", referencedColumnName="profession_id")
     * })
     */
    private $profession;

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
     * Set song
     *
     * @param \AppBundle\Entity\Song $song
     *
     * @return PersonHasSong
     */
    public function setSong(\AppBundle\Entity\Song $song)
    {
        $this->song = $song;

        return $this;
    }

    /**
     * Get song
     *
     * @return \AppBundle\Entity\Song
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Set profession
     *
     * @param \AppBundle\Entity\Profession $profession
     *
     * @return PersonHasSong
     */
    public function setProfession(\AppBundle\Entity\Profession $profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return \AppBundle\Entity\Profession
     */
    public function getProfession()
    {
        return $this->profession;
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
