<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 08/02/2018
 * Time: 22:11
 */

namespace GestionEJBundle\Controller;


use GestionEJBundle\Entity\Equipe;
use GestionEJBundle\Form\AjoutEquipe;
use GestionEJBundle\Form\AjoutJoueur;
use Symfony\Component\HttpFoundation\Request;

class EquipeController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutEquipeAction(Request $request)
    {
        $m=new Equipe();
        $form=$this->createForm(AjoutEquipe::class,$m);
        $form->handleRequest($request);
        if ($form->isValid())
        {

            $em = $this->getDoctrine()->getManager();

            $em->persist($m);
            $em->flush();

        }
        return $this->render('@GestionEJ/TemplateAdmin/ajouterequipe.html.twig',array('form'=>$form->createView()));

    }
    public function GoToAfficheEquipeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->findAll();
        return $this->render('@GestionEJ/TemplateAdmin/afficherEquipes.html.twig', array('m' => $model));
    }
    public function GoToSuppEquipeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->find($request->get('id'));
        $model=$em->merge($model);
        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('AfficheEquipe');
}
    public function GoToModifEquipeAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->find($id);
        $form=$this->createForm(AjoutEquipe::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('AfficheEquipe');
        }
        return $this->render('@GestionEJ/TemplateAdmin/modifEquipe.html.twig',array('m'=>$model,'form'=>$form->createView()
        ));

    }
}