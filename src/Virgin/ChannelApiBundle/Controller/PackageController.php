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

class PackageController extends Controller
{

    /**
     * @return array
     * @View()
     */
    public function getPackagesAction()
    {
        $packages = $this->getDoctrine()->getRepository('VirginChannelGuideBundle:Package')->findAll();
        return array('packages' => $packages);
    }

    /**
     * @param Package $package
     * @return array
     * @View()
     * @ParamConverter("package", class="VirginChannelGuideBundle:Package")
     */
    public function getPackageAction(Package $package)
    {
        return array('package' => $package);
    }
}