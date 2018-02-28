<?php

namespace GestionCommoditeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionCommoditeBundle:Default:index.html.twig');
    }
}
