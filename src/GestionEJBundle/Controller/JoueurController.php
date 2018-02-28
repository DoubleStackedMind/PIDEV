<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 08/02/2018
 * Time: 22:11
 */

namespace GestionEJBundle\Controller;


use GestionEJBundle\Entity\Joueur;
use GestionEJBundle\Form\AjoutEquipe;
use GestionEJBundle\Form\AjoutJoueur;
use Symfony\Component\HttpFoundation\Request;

class JoueurController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutJoueurAction(Request $request)
    {
        $m=new Joueur();
        $form=$this->createForm(AjoutJoueur::class,$m);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($m);
            $em->flush();

        }
        return $this->render('@GestionEJ/TemplateAdmin/ajouterjoueur.html.twig',array('form'=>$form->createView()));

    }
    public function GoToAfficheJoueurAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->findAll();
        return $this->render('@GestionEJ/TemplateAdmin/afficherJoueurs.html.twig', array('m' => $model));
    }
    public function GoToSuppJoueurAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->find($request->get('id'));
        $model=$em->merge($model);
        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('AfficheJoueur');
    }
    public function GoToModifJoueurAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->find($id);
        $form=$this->createForm(AjoutJoueur::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('AfficheJoueur');
        }
        return $this->render('@GestionEJ/TemplateAdmin/modifJoueurs.html.twig',array('m'=>$model,'form'=>$form->createView()
        ));

    }
}