<?php

namespace Kadiri\KadiriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KadiriBundle:Default:index.html.twig');
    }
}
