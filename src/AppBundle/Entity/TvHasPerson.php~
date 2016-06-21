<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TvHasPerson
 *
 * @ORM\Table(name="TV_has_person", indexes={@ORM\Index(name="fk_TV_has_person_person1_idx", columns={"person_id"}), @ORM\Index(name="fk_TV_has_person_TV1_idx", columns={"TV_id"}), @ORM\Index(name="fk_TV_has_person_profession1_idx", columns={"profession_id"})})
 * @ORM\Entity
 */
class TvHasPerson
{
    /**
     * @var \AppBundle\Entity\Tv
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Tv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TV_id", referencedColumnName="TV_id")
     * })
     */
    private $tv;

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
     * Set tv
     *
     * @param \AppBundle\Entity\Tv $tv
     *
     * @return TvHasPerson
     */
    public function setTv(\AppBundle\Entity\Tv $tv)
    {
        $this->tv = $tv;

        return $this;
    }

    /**
     * Get tv
     *
     * @return \AppBundle\Entity\Tv
     */
    public function getTv()
    {
        return $this->tv;
    }

    /**
     * Set profession
     *
     * @param \AppBundle\Entity\Profession $profession
     *
     * @return TvHasPerson
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
     * @return TvHasPerson
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
