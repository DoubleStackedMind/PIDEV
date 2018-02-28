<?php

namespace GestionTransportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionTransportBundle:Default:index.html.twig');
    }
}
