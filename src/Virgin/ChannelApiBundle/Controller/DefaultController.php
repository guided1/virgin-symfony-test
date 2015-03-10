<?php

namespace Virgin\ChannelApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VirginChannelApiBundle:Default:index.html.twig', array('name' => $name));
    }
}
