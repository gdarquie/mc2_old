<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonHasRadio
 *
 * @ORM\Table(name="person_has_radio", indexes={@ORM\Index(name="fk_person_has_radio_radio1_idx", columns={"radio_id"}), @ORM\Index(name="fk_person_has_radio_person1_idx", columns={"person_id"}), @ORM\Index(name="fk_person_has_radio_profession1_idx", columns={"profession_id"})})
 * @ORM\Entity
 */
class PersonHasRadio
{
    /**
     * @var \AppBundle\Entity\Radio
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Radio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="radio_id", referencedColumnName="radio_id")
     * })
     */
    private $radio;

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
     * Set radio
     *
     * @param \AppBundle\Entity\Radio $radio
     *
     * @return PersonHasRadio
     */
    public function setRadio(\AppBundle\Entity\Radio $radio)
    {
        $this->radio = $radio;

        return $this;
    }

    /**
     * Get radio
     *
     * @return \AppBundle\Entity\Radio
     */
    public function getRadio()
    {
        return $this->radio;
    }

    /**
     * Set profession
     *
     * @param \AppBundle\Entity\Profession $profession
     *
     * @return PersonHasRadio
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
     * @return PersonHasRadio
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
