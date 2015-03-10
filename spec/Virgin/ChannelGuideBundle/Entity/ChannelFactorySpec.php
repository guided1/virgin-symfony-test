<?php

namespace spec\Virgin\ChannelGuideBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Virgin\ChannelGuideBundle\Entity\Package;
use Virgin\ChannelGuideBundle\Entity\Channel;
use Virgin\ChannelGuideBundle\Entity\ChannelRepository;
use Virgin\ChannelGuideBundle\Entity\Region;
use Virgin\ChannelGuideBundle\Entity\RegionalisedChannel;
use Virgin\ChannelGuideBundle\Entity\RegionalisedChannelRepository;

class ChannelFactorySpec extends ObjectBehavior
{
    function let(ChannelRepository $channelRepository, RegionalisedChannelRepository $regionalisedChannelRepository,  Region $region, Package $package)
    {
        $this->beConstructedWith($channelRepository, $regionalisedChannelRepository);
        $this->setPackage($package);
        $this->setRegion($region);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Virgin\ChannelGuideBundle\Entity\ChannelFactory');
    }

    function it_can_compose_region_channels_with_base_channels(Channel $baseChannel,Channel $baseChannel2, RegionalisedChannel $regionChannel)
    {
        $baseChannel->getId()->willReturn(1);
        $baseChannel2->getId()->willReturn(5);

        $regionChannel->getBaseChannelId()->willReturn(1);
        $regionChannel->getId()->willReturn(2);

        $channels = array($baseChannel2, $baseChannel);
        $regionChannels = array($regionChannel);

        $this->composeChannels($channels, $regionChannels)[1]->getId()->shouldReturn(2);
    }

    function it_can_get_channels_from_the_repository($channelRepository, $regionalisedChannelRepository, Channel $baseChannel,Channel $baseChannel2, RegionalisedChannel $regionChannel)
    {
        $baseChannel->getId()->willReturn(1);
        $baseChannel2->getId()->willReturn(5);

        $regionChannel->getBaseChannelId()->willReturn(1);
        $regionChannel->getId()->willReturn(2);
        // $regionChannel->setBaseChannel($baseChannel)->shouldBeCalled();

        $channels = array($baseChannel2, $baseChannel);
        $channelsDecorators = array($regionChannel);

        $channelRepository->findByPackage(Argument::any())->willReturn($channels);
        $regionalisedChannelRepository->findByRegionAndPackage(Argument::any(), Argument::any())->willReturn($channelsDecorators);
        $this->getChannels()->shouldHaveCount(2);
        $this->getChannels()[1]->getId()->shouldReturn(2);
    }
}
