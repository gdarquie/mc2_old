<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiscHasPerson
 *
 * @ORM\Table(name="disc_has_person", indexes={@ORM\Index(name="fk_disc_has_person_person1_idx", columns={"person_id"}), @ORM\Index(name="fk_disc_has_person_disc1_idx", columns={"disc_id"}), @ORM\Index(name="fk_disc_has_person_profession1_idx", columns={"profession_id"})})
 * @ORM\Entity
 */
class DiscHasPerson
{
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
     * @var \AppBundle\Entity\Disc
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Disc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disc_id", referencedColumnName="disc_id")
     * })
     */
    private $disc;



    /**
     * Set profession
     *
     * @param \AppBundle\Entity\Profession $profession
     *
     * @return DiscHasPerson
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
     * @return DiscHasPerson
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

    /**
     * Set disc
     *
     * @param \AppBundle\Entity\Disc $disc
     *
     * @return DiscHasPerson
     */
    public function setDisc(\AppBundle\Entity\Disc $disc)
    {
        $this->disc = $disc;

        return $this;
    }

    /**
     * Get disc
     *
     * @return \AppBundle\Entity\Disc
     */
    public function getDisc()
    {
        return $this->disc;
    }
}
