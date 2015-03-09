<?php
/**
 * Created by PhpStorm.
 * User: gerard
 * Date: 09/03/15
 * Time: 15:27
 */

namespace Virgin\ChannelGuideBundle\Entity;


interface ChannelInterface
{
    public function getId();

    public function setName($name);

    public function getName();

    public function setNumber($number);
    public function getNumber();
}