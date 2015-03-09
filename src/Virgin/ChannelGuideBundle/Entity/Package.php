<?php

namespace Virgin\ChannelGuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Package
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Package
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    private $name;

    private $channels = array();

    private $packages = array();

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
     * @return Package
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
     * Set channels
     *
     * @param array $channels
     * @return Package
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }

    public function addChannel(Channel $channel)
    {
        $this->channels[] = $channel;
    }

    /**
     * Get channels
     *
     * @return array 
     */
    public function getChannels()
    {
        $channels = $this->channels;
        if (!empty($this->packages)) {
            foreach ($this->packages as $package) {
                $channels = array_merge($channels, $package->getChannels());
            }
            // sort and make sure channels are unique
        }
        return $channels;
    }


    public function addPackage($package)
    {
        $this->packages[] = $package;
    }


    public function getPackages()
    {
        return $this->packages;
    }
}
