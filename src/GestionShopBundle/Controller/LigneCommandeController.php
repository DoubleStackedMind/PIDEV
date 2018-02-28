<?php

namespace GestionShopBundle\Controller;

use GestionShopBundle\Entity\Lignedecommande;
use GestionShopBundle\Entity\Produits;
use MyApp\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LigneCommandeController extends Controller
{


    public function addToCartAction ($idProduit)
    {
         $session= $this->get('session');

            if (!$session->has('panier')) $session->set('panier',array());
            $panier=$session->get('panier');
            if(array_key_exists($idProduit,$panier)){

                $panier[$idProduit]=$panier[$idProduit]+1;
            }else $panier[$idProduit]=1;

            $session->set('panier',$panier);

            $em=$this->getDoctrine()->getManager();
            $am=$em->getRepository("GestionShopBundle:Produits")->findAll();
            if (!$session->has('panier')) $session->set('panier',array());

            return $this->render('GestionShopBundle::Shop.html.twig',array('pro'=>$am));
    }

    public function cartAction()
    {

        $session= $this->get('session');
        if (!$session->has('panier')) $session->set('panier',array());

        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository('GestionShopBundle:Produits')->findArray(array_keys($session->get('panier')));

        return $this->render('@GestionShop/cart.html.twig',array('produits'=>$produits,
            'panier'=>$session->get('panier')));
    }

    public function RemoveOneFromCartAction($idProduit)
    {
        $session= $this->get('session');

        if (!$session->has('panier')) $session->set('panier',array());
        $panier=$session->get('panier');
        if(array_key_exists($idProduit,$panier)) {

            $panier[$idProduit] -= 1;
        }

        $session->set('panier',$panier);

        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository('GestionShopBundle:Produits')->findArray(array_keys($session->get('panier')));

        return $this->render('@GestionShop/Updatecart.html.twig',array('produits'=>$produits,
            'panier'=>$panier));

    }

    public function RemoveFromCartAction($idProduit)
    {
        $session= $this->get('session');

        if (!$session->has('panier')) $session->set('panier',array());
        $panier=$session->get('panier');
        if(array_key_exists($idProduit,$panier)) {

           unset($panier[$idProduit]);
        }

        $session->set('panier',$panier);

        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository('GestionShopBundle:Produits')->findArray(array_keys($session->get('panier')));

        return $this->render('@GestionShop/Updatecart.html.twig',array('produits'=>$produits,
            'panier'=>$panier));

    }
    public function ajouterLigneAction(Request $request,$idProduit,$id)
    {
        $Lc= new Lignedecommande();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository(Produits::class)->find($idProduit);
        $usr = $em->getRepository(User::class)->find($id);
        $Lc->setIdproduit($produit);
        $Lc->setIdUser($usr);
        $Lc->setPrix($produit->getPrix());
        $Lc->setEtat('NC');
        $Lc->setQuantite(1);
            $em->persist($Lc);
            $em->flush();
        return $this->render('@GestionShop/productdetailsCommande.html.twig', array( 'prod' => $produit));

    }




    public function supprimerLigneCommandeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository("GestionShopBundle:Lignedecommande")->find($request->get('IdLigne'));
        $em->remove($p);
        $em->flush();
        return $this->redirectToRoute('afficherProduitsUser');
    }


}
