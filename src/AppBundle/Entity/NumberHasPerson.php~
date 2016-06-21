<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NumberHasPerson
 *
 * @ORM\Table(name="number_has_person", indexes={@ORM\Index(name="fk_number_has_person_person1_idx", columns={"person_id"}), @ORM\Index(name="fk_number_has_person_number1_idx", columns={"number_id"}), @ORM\Index(name="fk_number_has_person_profession1_idx", columns={"profession_id"})})
 * @ORM\Entity
 */
class NumberHasPerson
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
     * @var \AppBundle\Entity\Number
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Number")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
     * })
     */
    private $number;



    /**
     * Set profession
     *
     * @param \AppBundle\Entity\Profession $profession
     *
     * @return NumberHasPerson
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
     * @return NumberHasPerson
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
     * Set number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return NumberHasPerson
     */
    public function setNumber(\AppBundle\Entity\Number $number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return \AppBundle\Entity\Number
     */
    public function getNumber()
    {
        return $this->number;
    }
}
