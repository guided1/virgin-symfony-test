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
        $this->shouldHaveType('Virgin\ChannelGuideBundle\Entity\ChannelInterface');
    }
}
