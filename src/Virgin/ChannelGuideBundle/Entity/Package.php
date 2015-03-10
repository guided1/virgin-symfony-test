<?php

namespace Virgin\ChannelGuideBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\PersistentCollection;

/**
 * Package
 *
 * @ORM\Table(name="package")
 * @ORM\Entity
 * @JMS\AccessType("public_method")
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

    /**
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="Channel")
     * @ORM\JoinTable(name="package_channel")
     */
    private $channels = array();


    /**
     * @ORM\ManyToMany(targetEntity="Package")
     * @ORM\JoinTable(name="package_sub_package",
     *      joinColumns={@ORM\JoinColumn(name="package_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sub_package_id", referencedColumnName="id")}
     *      )
     * @JMS\Exclude()
     **/
    private $subPackages = array();

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
        /** @var PersistentCollection $channels */
        $channels = empty($this->channels) ? new ArrayCollection(array()) : $this->channels;
        if (!empty($this->subPackages)) {
            foreach ($this->subPackages as $package) {
                $channels = new ArrayCollection(array_merge($channels->toArray(),
                    $package->getChannels()->toArray()));
            }
            // sort and make sure channels are unique
        }
        return $channels;
    }


    public function addSubPackage($package)
    {
        $this->subPackages[] = $package;
    }

    public function setSubPackages($packages)
    {
        $this->subPackages = $packages;
    }


    public function getSubPackages()
    {
        return $this->subPackages;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
