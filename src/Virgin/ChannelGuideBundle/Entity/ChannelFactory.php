<?php
/**
 * Created by PhpStorm.
 * User: gerard
 * Date: 09/03/15
 * Time: 12:59
 */

namespace Virgin\ChannelGuideBundle\Entity;


use Doctrine\ORM\EntityRepository;

class ChannelFactory {

    private $channelRepository;
    private $regionalisedChannelRepository;
    private $region;
    private $package;

    public function __construct(EntityRepository $repository, EntityRepository $regionalisedChannelRepository)
    {
        $this->channelRepository = $repository;
        $this->regionalisedChannelRepository = $regionalisedChannelRepository;
    }

    public function composeChannels($channelList, $regionDecorators)
    {
        $list = array();
        foreach ($channelList as $key => $channel) {
            $list[$channel->getId()] = $channel;
        }

        foreach ($regionDecorators as $regionDecorator) {
            if (isset($list[$regionDecorator->getBaseChannelId()])) {
                $list[$regionDecorator->getBaseChannelId()] = $regionDecorator;
            }
         }

        return $list;
    }


    public function getChannels()
    {
        $channels = $this->channelRepository->findByPackage($this->package);
        $decorators = $this->regionalisedChannelRepository->findByRegionAndPackage($this->region, $this->package);
        return $this->composeChannels($channels, $decorators);
    }

    public function setPackage($package)
    {
        $this->package = $package;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }
}
