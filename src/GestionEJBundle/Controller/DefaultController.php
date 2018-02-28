<?php

namespace GestionEJBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionEJBundle:Default:index.html.twig');
    }
    public function afficheAction()
    {

        return $this->render(':default:index.html.twig');

    }
}
