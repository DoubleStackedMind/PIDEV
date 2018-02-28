<?php

namespace GestionShopBundle\Controller;

use GestionShopBundle\Entity\Produits;
use GestionShopBundle\Form\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProduitsController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionShopBundle:Default:index.html.twig');
    }
    public function afficherProduitsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository(Produits::class)->findAll();

        return $this->render('@GestionShop/TemplateAdmin/afficherproduits.html.twig'
            ,array('pro'=>$p));
    }
    public function afficherProduitsUserAction()
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository(Produits::class)->findAll();

        return $this->render('GestionShopBundle::Shop.html.twig'
            ,array('pro'=>$p));
    }



    public function ajouterproduitAction(Request $request)
    {
        $comment = new Produits();
        $form = $this->createForm(ProduitsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('afficherProduits');
        }

        return $this->render('GestionShopBundle:TemplateAdmin:ajouterproduit.html.twig', array(
            'comment' => $comment,
            'form' => $form->createView(),
        ));
    }

    public function afficherMProduitAction()
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository(Produits::class)->findAll();

        return $this->render('GestionShopBundle:TemplateAdmin:afficherMproduits.html.twig'
            ,array('pro'=>$p));
    }

    public function ModifierAction(Request $request, Produits $prod)
    {
        $editForm = $this->createForm('GestionShopBundle\Form\ModifierProduitsType', $prod);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $prod->upload();
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('afficherProduits');
        }

        return $this->render('@GestionShop/TemplateAdmin/modifier.html.twig', array(
            'prod' => $prod,
            'form' => $editForm->createView(),
        ));
    }

    public function afficherSProduitAction()
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository(Produits::class)->findAll();

        return $this->render('GestionShopBundle:TemplateAdmin:afficherSproduits.html.twig'
            ,array('pro'=>$p));
    }

    public function ShowDetailsAction($idProduit)
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository(Produits::class)->find($idProduit);
        return $this->render('@GestionShop/productdetails.html.twig'
            ,array('pro'=>$p));
    }

    public function supprimerProduitAction($idProduit)
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository("GestionShopBundle:Produits")->find($idProduit);
        $em->remove($p);
        $em->flush();
        return $this->redirectToRoute('afficherProduits');
    }

    public function StockAvailabilityAction(Produits $produit)
    {
        if($produit->getQuantite() > 10)
        {
            return new Response('En Stock');
        }
        if(0<$produit->getQuantite() && $produit->getQuantite()<10)
        {
            return new Response('Limitée');
        }
        if($produit->getQuantite() == 0)
        {
            return new Response("N'est pas disponible");
        }
    }


    public function getProductNameById($idproduit)
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository('GestionShopBundle:Produits')->find($idproduit);

        return $p->getNom() ;
    }
    public function getProductPrixById($idproduit)
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository('GestionShopBundle:Produits')->find($idproduit);

        return $p->getPrix() ;
    }

    public function getProductImageById($idproduit)
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository('GestionShopBundle:Produits')->find($idproduit);

        return $p->getImage() ;
    }




}
