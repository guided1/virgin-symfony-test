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

    private $repository;
    private $region;
    private $package;

    public function __construct(EntityRepository $repository, $region, $package)
    {
        $this->repository = $repository;
        $this->region = $region;
        $this->package = $package;
    }

    public function composeChannels($channelList)
    {
        $list = array();
        do {
            $listWasChanged = false;
            foreach ($channelList as $key => $channel) {
                if ($channel->getBaseChannelId() === null) {
                    $list[$channel->getId()] = $channel;
                    unset($channelList[$key]);
                    $listWasChanged = true;
                }

                if ($channel->getBaseChannelId() !== null && isset($list[$channel->getBaseChannelId()])) {
                    $channel->setBaseChannel($list[$channel->getBaseChannelId()]);
                    unset($list[$channel->getBaseChannelId()]);
                    $list[$channel->getId()] = $channel;
                    unset($channelList[$key]);
                    $listWasChanged = true;
                }
            }

        } while ($listWasChanged && !empty($channelList));

        return $list;
    }


    public function getChannels()
    {
        $channels = $this->repository->findByRegionAndPackage($this->region, $this->package);
        return $this->composeChannels($channels);
    }
}
