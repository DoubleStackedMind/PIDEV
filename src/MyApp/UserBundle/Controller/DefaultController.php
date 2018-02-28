<?php

namespace MyApp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyAppUserBundle:Default:index.html.twig');
    }
    public function afficheAction()
    {
        return $this->render('@MyAppUser/template 2/index.html.twig');

    }
    public function jarrebAction()
    {
        return $this->render('@MyAppUser/template 2/aa.html.twig');
    }
}
