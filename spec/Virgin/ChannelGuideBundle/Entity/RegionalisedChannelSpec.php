<?php

namespace spec\Virgin\ChannelGuideBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Virgin\ChannelGuideBundle\Entity\Channel;

class RegionalisedChannelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Virgin\ChannelGuideBundle\Entity\RegionalisedChannel');
        $this->shouldHaveType('Virgin\ChannelGuideBundle\Entity\ChannelInterface');
        $this->shouldHaveType('Virgin\ChannelGuideBundle\Entity\ChannelDecoratorInterface');
    }

    function it_can_get_base_name()
    {
        $name = "BBC 3";
        $this->setName($name);
        $this->getName()->shouldReturn($name);
    }

    function it_can_get_overridden_name(Channel $baseChannel)
    {
        $baseName = "BBC 3";
        $name = "BBC 3 - London";
        $this->setName($name);
        $baseChannel->getName()->willReturn($baseName);

        $this->setBaseChannel($baseChannel);
        $this->getName()->shouldReturn($name);
    }

    function it_can_get_base_channel_name_if_not_set(Channel $baseChannel)
    {
        $baseName = "BBC 3";
        $baseChannel->getName()->willReturn($baseName);

        $this->setBaseChannel($baseChannel);
        $this->getName()->shouldReturn($baseName);
    }

    function it_can_get_base_number()
    {
        $number = "1";
        $this->setNumber($number);
        $this->getNumber()->shouldBeLike($number);
    }

    function it_can_get_overridden_number(Channel $baseChannel)
    {
        $number = "100";
        $this->setNumber($number);
        $baseNumber = "1";
        $baseChannel->getNumber()->willReturn($baseNumber);

        $this->setBaseChannel($baseChannel);
        $this->getNumber()->shouldBeLike($number);
    }

    function it_can_get_base_channel_number_if_not_set(Channel $baseChannel)
    {
        $baseNumber = "1";
        $baseChannel->getNumber()->willReturn($baseNumber);

        $this->setBaseChannel($baseChannel);
        $this->getNumber()->shouldBeLike($baseNumber);
    }
}
