<?php

namespace GestionShopBundle\Controller;

use GestionShopBundle\Entity\Commandes;
use GestionShopBundle\Entity\Lignedecommande;
use GestionShopBundle\Entity\Produits;
use GestionShopBundle\Form\ProduitsType;
use MyApp\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Validator\Constraints\Count;

class CommandeController extends Controller
{

    public function ValiderCommandeAction($id)
    {



        $totale = 0;

        $em=$this->getDoctrine()->getManager();
        $usr = $em->getRepository('MyAppUserBundle:User')->find($id);
        if($usr === null)
        {
            $this->redirectToRoute('fos_user_security_login');
        }
        else {

            $c = new Commandes();
            $session = $this->get('session');
            $panier = $session->get('panier');
            if (!$session->has('panier')) $session->set('panier', array());



            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $produits = $em->getRepository('GestionShopBundle:Produits')->findArray(array_keys($session->get('panier')));
            $jsonContent = $serializer->serialize($produits, 'json');
            $StringArray = json_encode($jsonContent, JSON_FORCE_OBJECT);
            foreach ($produits as $p) {
               $c->setIdUser($usr);
              $c->setIdProduit($p);
              $c->setQuantite($panier[$p->getIdProduit()]);

                $totale += $totale + ($p->getPrix() * $panier[$p->getIdProduit()]);


                $p->setQuantite($p->getQuantite() - 1 );
                $em->getRepository('GestionShopBundle:Commandes')->UpdateStock($p->getIdProduit());
                $this->getDoctrine()->getManager()->flush();
                unset($panier[$p->getIdProduit()]);

                $session->set('panier',$panier);

            }
            $c->setPrix($totale);
            $c->setCommandes($StringArray);


            $em->persist($c);
            $em->flush();

            $commandes = $em->getRepository(Commandes::class)->findBy(array('idUser' => $id));


            $i=0;
$tab = array();
            foreach ($commandes as $o) {
                {
                    $tab[$i] = json_decode(json_decode($o->getCommandes(), true));
                    $i++;

                }
            }
            return $this->render('@GestionShop/commandes.html.twig', array( 'tabObj' => $tab,'comnum' => $commandes));
        }
        return null;
    }





    public function AfficherCommandeAction($id)
    {

        $tab = array();

        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository(Commandes::class)->findBy(array('idUser' => $id));
$i=0;


        foreach ($commandes as $o) {
            {
                $tab[$i] = json_decode(json_decode($o->getCommandes(), true));
                $i++;

            }


}
        return $this->render('@GestionShop/commandes.html.twig', array( 'tabObj' => $tab,'comnum' => $commandes));
    }



    public function AnnulerCommandeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository("GestionShopBundle:Commandes")->findBy(array('id'=>$request->get('id')));
        foreach ($commandes as $c) {
            $prod = $em->getRepository(Produits::class)->find($c->getIdProduit());
            $prod->setQuantite($prod->getQuantite() + 1);
            $em->getRepository(Produits::class)->UpdateStock($prod->getIdProduit());
            $this->getDoctrine()->getManager()->flush();
            $em->remove($c);
            $em->flush();

        }
$tab = array();
        $i=0;

        foreach ($commandes as $o) {

                $tab[$i] = json_decode(json_decode($o->getCommandes(), true));
                $i++;

        }
        return $this->render('@GestionShop/commandes.html.twig', array( 'tabObj' => $tab,'comnum' => $commandes));

    }



}
