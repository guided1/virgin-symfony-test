<?php

namespace Virgin\ChannelGuideBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ChannelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RegionalisedChannelRepository extends EntityRepository
{

    public function findByRegionAndPackage(Region $region, Package $package)
    {

    }
}