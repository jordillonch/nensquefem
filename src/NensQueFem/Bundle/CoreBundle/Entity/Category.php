<?php

namespace NensQueFem\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
{
    public static $ANIMACIO = 1;
    public static $CINEMA = 2;
    public static $CIRC = 3;
    public static $CONTES = 4;
    public static $EXPOSICIO = 5;
    public static $JOCS = 6;
    public static $TALLER = 7;
    public static $LITERATURA = 8;
    public static $EXCURSIONS = 9;

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
     * @var string
     *
     * @ORM\Column(name="key_words", type="string", length=255)
     */
    private $keyWords;

    /**
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="category")
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
     * @return Category
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
     * @return Category
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
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Set keyWords
     *
     * @param string $keyWords
     * @return Category
     */
    public function setKeyWords($keyWords)
    {
        $this->keyWords = $keyWords;
    
        return $this;
    }

    /**
     * Get keyWords
     *
     * @return string 
     */
    public function getKeyWords()
    {
        return $this->keyWords;
    }
}