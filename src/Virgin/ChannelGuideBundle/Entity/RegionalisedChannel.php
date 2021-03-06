<?php

namespace Virgin\ChannelGuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;


/**
 * Regionalised Channel
 *
 * Channel Customisations for a region.
 *
 * @ORM\Table(name="regionalised_channel")
 * @ORM\Entity(repositoryClass="Virgin\ChannelGuideBundle\Entity\RegionalisedChannelRepository")
 * @JMS\AccessType("public_method")
 */
class RegionalisedChannel implements ChannelInterface, ChannelDecoratorInterface
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;


    /**
     * @var number
     * @ORM\Column(type="string", nullable=true)
     */
    private $number;


    /**
     * @var Channel
     *
     * @ORM\OneToOne(targetEntity="Channel")
     * @ORM\JoinColumn(name="base_channel_id", referencedColumnName="id")
     * @JMS\Exclude();
     */
    private $baseChannel = null;


    /**
     * @var Channel
     *
     * @ORM\OneToOne(targetEntity="Region")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @JMS\Exclude()
     */
    private $region = null;


    /**
     * @var int
     */
    private $baseChannelId = null;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getBaseChannelId()
    {
        return $this->baseChannel->getId();
    }

    public function setBaseChannelId($baseChannelId)
    {
        $this->baseChannelId = $baseChannelId;
    }

    public function getBaseChannel()
    {
        return $this->baseChannel;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        $name = $this->name;
        if (is_null($name) && !is_null($this->baseChannel)) {
            $name = $this->baseChannel->getName();
        }
        return $name;
    }

    public function setBaseChannel($channel)
    {
        $this->baseChannel = $channel;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        $number = $this->number;
        if (is_null($number) && !is_null($this->baseChannel)) {
            $number = $this->baseChannel->getNumber();
        }
        return $number;
    }

    /**
     * @return Channel
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param Channel $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }
}
