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

class RegionController extends Controller {

    /**
     * @return array
     * @View()
     */
    public function getRegionAction()
    {
        $regions = $this->getDoctrine()->getRepository('VirginChannelGuideBundle:Region')->findAll();
        return array('regions' => $regions);
    }
}