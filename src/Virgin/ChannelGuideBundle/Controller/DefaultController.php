<?php

namespace Virgin\ChannelGuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VirginChannelGuideBundle:Default:index.html.twig');
    }
}
