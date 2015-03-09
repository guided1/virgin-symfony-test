<?php

namespace Virgin\ChannelGuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Channel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Virgin\ChannelGuideBundle\Entity\RegionalisedChannelRepository")
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
     * @ORM\Column(type="string")
     */
    private $name;


    /**
     * @var number
     * @ORM\Column(type="string")
     */
    private $number;


    /**
     * @var Channel
     */
    private $baseChannel = null;

    /**
     * @var Channel
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

    public function getBaseChannelId()
    {
        return $this->baseChannelId;
    }

    public function setBaseChannelId($baseChannelId)
    {
        $this->baseChannelId = $baseChannelId;
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
}
