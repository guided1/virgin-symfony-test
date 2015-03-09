<?php

namespace Virgin\ChannelGuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Channel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Virgin\ChannelGuideBundle\Entity\ChannelRepository")
 */
class Channel implements ChannelInterface
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
        return $this->name;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }
}
