<?php

namespace spec\Virgin\ChannelGuideBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Virgin\ChannelGuideBundle\Entity\Package;
use Virgin\ChannelGuideBundle\Entity\Channel;
use Virgin\ChannelGuideBundle\Entity\ChannelRepository;
use Virgin\ChannelGuideBundle\Entity\Region;

class ChannelFactorySpec extends ObjectBehavior
{
    function let(ChannelRepository $repository, Region $region, Package $package)
    {
        $this->beConstructedWith($repository, $region, $package);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Virgin\ChannelGuideBundle\Entity\ChannelFactory');
    }

    function it_can_compose_region_channels_with_base_channels(Channel $baseChannel,Channel $baseChannel2, Channel $regionChannel)
    {
        $baseChannel->getId()->willReturn(1);
        $baseChannel->getBaseChannelId()->willReturn(null);

        $baseChannel2->getId()->willReturn(5);
        $baseChannel2->getBaseChannelId()->willReturn(null);

        $regionChannel->getBaseChannelId()->willReturn(1);
        $regionChannel->getId()->willReturn(2);
        $regionChannel->setBaseChannel($baseChannel)->shouldBeCalled();

        $channels = array($baseChannel2, $baseChannel, $regionChannel);

        $this->composeChannels($channels)->shouldHaveCount(2);
    }

    function it_can_get_channels_from_the_repository($repository, Channel $baseChannel, Channel $regionChannel)
    {
        $baseChannel->getId()->willReturn(1);
        $baseChannel->getBaseChannelId()->willReturn(null);
        $regionChannel->getBaseChannelId()->willReturn(1);
        $regionChannel->getId()->willReturn(2);
        $regionChannel->setBaseChannel($baseChannel)->shouldBeCalled();

        $channels = array($regionChannel, $baseChannel);

        $repository->findByRegionAndPackage(Argument::any(), Argument::any())->willReturn($channels);
        $this->getChannels()->shouldHaveCount(1);
    }
}
