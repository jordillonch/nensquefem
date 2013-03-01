<?php

namespace NensQueFem\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NensQueFem\Bundle\CoreBundle\Entity\ActivityRepository")
 */
class Activity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="source_id", type="integer")
     */
    private $sourceId;

    /**
     * @var string
     *
     * @ORM\Column(name="external_id", type="string", length=255)
     */
    private $externalId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="permalink", type="string", length=255, nullable=true)
     */
    private $permalink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="recommended_age_from", type="integer", nullable=true)
     */
    private $recommendedAgeFrom;

    /**
     * @var integer
     *
     * @ORM\Column(name="recommended_age_to", type="integer", nullable=true)
     */
    private $recommendedAgeTo;


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
     * Set externalId
     *
     * @param string $externalId
     * @return Activity
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
    
        return $this;
    }

    /**
     * Get externalId
     *
     * @return string 
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Activity
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Activity
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Activity
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Activity
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set permalink
     *
     * @param string $permalink
     * @return Activity
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
    
        return $this;
    }

    /**
     * Get permalink
     *
     * @return string 
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Activity
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set recommendedAgeFrom
     *
     * @param integer $recommendedAgeFrom
     * @return Activity
     */
    public function setRecommendedAgeFrom($recommendedAgeFrom)
    {
        $this->recommendedAgeFrom = $recommendedAgeFrom;
    
        return $this;
    }

    /**
     * Get recommendedAgeFrom
     *
     * @return integer 
     */
    public function getRecommendedAgeFrom()
    {
        return $this->recommendedAgeFrom;
    }

    /**
     * Set recommendedAgeTo
     *
     * @param integer $recommendedAgeTo
     * @return Activity
     */
    public function setRecommendedAgeTo($recommendedAgeTo)
    {
        $this->recommendedAgeTo = $recommendedAgeTo;
    
        return $this;
    }

    /**
     * Get recommendedAgeTo
     *
     * @return integer 
     */
    public function getRecommendedAgeTo()
    {
        return $this->recommendedAgeTo;
    }

    /**
     * @param integer $sourceId
     * @return Activity
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * @return integer
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

}
