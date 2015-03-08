<?php

namespace spec\Virgin\ChannelGuideBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Virgin\ChannelGuideBundle\Entity\Channel;

class ChannelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Virgin\ChannelGuideBundle\Entity\Channel');
    }

    function it_can_get_base_name()
    {
        $name = "BBC 3";
        $this->setName($name);
        $this->getName()->shouldReturn($name);
    }

    function it_can_get_overridden_name(Channel $channel)
    {
        $name = "BBC 3";
        $this->setName($name);
        $overriddenName = "BBC 3 - London";
        $channel->getName()->willReturn($overriddenName);

        $this->setRegionOverride($channel);
        $this->getName()->shouldReturn($overriddenName);
    }

    function it_can_get_base_number()
    {
        $number = "1";
        $this->setNumber($number);
        $this->getNumber()->shouldBeLike($number);
    }

    function it_can_get_overridden_number(Channel $channel)
    {
        $number = "1";
        $this->setNumber($number);
        $overriddenNumber = "100";
        $channel->getNumber()->willReturn($overriddenNumber);

        $this->setRegionOverride($channel);
        $this->getNumber()->shouldBeLike($overriddenNumber);
    }

}
