<?php

namespace NensQueFem\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * City
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class City
{
    public static $BARCELONA = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="city")
     */
    protected $activities;

    public function __construct()
    {
        $this->activities = new ArrayCollection();
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

    /**
     * Set name
     *
     * @param string $name
     * @return City
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
     * Add activities
     *
     * @param \NensQueFem\Bundle\CoreBundle\Entity\Activity $activities
     * @return City
     */
    public function addActivitie(\NensQueFem\Bundle\CoreBundle\Entity\Activity $activities)
    {
        $this->activities[] = $activities;
    
        return $this;
    }

    /**
     * Remove activities
     *
     * @param \NensQueFem\Bundle\CoreBundle\Entity\Activity $activities
     */
    public function removeActivitie(\NensQueFem\Bundle\CoreBundle\Entity\Activity $activities)
    {
        $this->activities->removeElement($activities);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return City
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }
}