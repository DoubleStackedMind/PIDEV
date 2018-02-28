<?php

namespace GestionShopBundle\Controller;

use GestionShopBundle\Entity\Produits;
use GestionShopBundle\Form\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionShopBundle:Default:index.html.twig');
    }



}
