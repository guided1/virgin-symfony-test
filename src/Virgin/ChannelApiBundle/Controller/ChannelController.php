<?php
/**
 * Created by PhpStorm.
 * User: gerard
 * Date: 10/03/15
 * Time: 12:05
 */

namespace Virgin\ChannelApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Virgin\ChannelGuideBundle\Entity\Package;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Virgin\ChannelGuideBundle\Entity\Region;

class ChannelController extends Controller
{

    /**
     * @param Region $region
     * @param Package $package
     * @return array
     * @View()
     */
    public function getChannelPackageAction(Region $region, Package $package)
    {
        $channelFactory = $this->get('virgin_channel_guide.channel_factory');
        $channelFactory->setRegion($region);
        $channelFactory->setPackage($package);
        return array('channels' => $channelFactory->getChannels());
    }
}