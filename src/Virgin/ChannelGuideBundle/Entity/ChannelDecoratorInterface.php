<?php
/**
 * Created by PhpStorm.
 * User: gerard
 * Date: 09/03/15
 * Time: 15:38
 */

namespace Virgin\ChannelGuideBundle\Entity;


interface ChannelDecoratorInterface
{
    public function getBaseChannelId();

    public function setBaseChannelId($baseChannelId);
}