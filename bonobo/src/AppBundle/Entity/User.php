<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends \FOS\UserBundle\Model\User
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255, nullable=true)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255, nullable=true)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="nourriture", type="string", length=255, nullable=true)
     */
    private $nourriture;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


    /**
     * @var bool
     *
     * @ORM\Column(name="is_connected", type="boolean")
     */
    private $isConnected;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     */
    private $amis;

    /**
     * Add ami
     *
     * @param \AppBundle\Entity\User $ami
     *
     * @return User
     */
    public function addAmi(\AppBundle\Entity\User $ami)
    {
        $this->amis[] = $ami;

        return $this;
    }

    /**
     * Remove ami
     *
     * @param \AppBundle\Entity\User $ami
     */
    public function removeAmi(\AppBundle\Entity\User $ami)
    {
        $this->amis->removeElement($ami);
    }

    /**
     * Get amis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmis()
    {
        return $this->amis;
    }


    public function __construct()
    {
        parent::__construct();
        $this->isActive     = false;
        $this->isConnected  = false;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set famille
     *
     * @param string $famille
     * @return User
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set race
     *
     * @param string $race
     * @return User
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }
    /**
     * Set nourriture
     *
     * @param string $nourriture
     * @return User
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    /**
     * Get nourriture
     *
     * @return string
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }
}