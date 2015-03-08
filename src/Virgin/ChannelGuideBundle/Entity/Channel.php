<?php

namespace Virgin\ChannelGuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Channel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Virgin\ChannelGuideBundle\Entity\ChannelRepository")
 */
class Channel
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
     * @var string
     */
    private $name;


    /**
     * @var number
     */
    private $number;


    /**
     * @var Channel
     */
    private $regionOverride = null;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        if (!is_null($this->regionOverride)) {
            return $this->regionOverride->getName();
        }
        return $this->name;
    }

    public function setRegionOverride($channel)
    {
        $this->regionOverride = $channel;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        if (!is_null($this->regionOverride)) {
            return $this->regionOverride->getNumber();
        }
        return $this->number;
    }
}
