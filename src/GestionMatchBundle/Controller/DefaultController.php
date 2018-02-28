<?php

namespace GestionMatchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionMatchBundle:Default:index.html.twig');
    }
}
