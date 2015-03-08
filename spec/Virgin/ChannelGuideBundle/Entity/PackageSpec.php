<?php

namespace spec\Virgin\ChannelGuideBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Virgin\ChannelGuideBundle\Entity\Channel;
use Virgin\ChannelGuideBundle\Entity\Package;

class PackageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Virgin\ChannelGuideBundle\Entity\Package');
    }

    function it_can_get_all_channels(Channel $channel1, Channel $channel2)
    {
        $this->addChannel($channel1);
        $this->addChannel($channel2);
        $this->getChannels()->shouldHaveCount(2);
    }

    function it_can_be_made_of_other_packages($smallPackage, $mediumPackage)
    {
        $this->addPackage($smallPackage);
        $this->addPackage($mediumPackage);
        $this->getPackages()->shouldHaveCount(2);
    }

    function it_can_get_channels_from_packages_it_contains(Package $smallPackage, Channel $channel, Channel $channel1, Channel $channel2)
    {
        $smallPackage->getChannels()->willReturn(array($channel));
        $this->addPackage($smallPackage);
        $this->addChannel($channel1);
        $this->addChannel($channel2);
        $this->getChannels()->shouldHaveCount(3);
    }
}
