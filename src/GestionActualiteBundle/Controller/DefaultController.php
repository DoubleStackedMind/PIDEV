<?php

namespace GestionActualiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionActualiteBundle:Default:index.html.twig');
    }
}
