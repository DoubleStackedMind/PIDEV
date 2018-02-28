<?php

namespace GestionEJBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutJoueur extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('numero')->add('datedenaissance',DateType::class)->add('lieunaissance')->add('taille')->add('poids')->add('nationalite')->add('poste1')->add('poste2')->add('poste3')->add('cout')->add('buts')->add('selections')->add('idEquipe',EntityType::class,
            array(
                'class'=>'GestionEJBundle\Entity\Equipe',
                'choice_label'=>'nom'))->add('participations')->add('pied')->add('imagejoueur1',FileType::class)->add('imagejoueur2',FileType::class)->add('imagejoueur3',FileType::class)->add('butsmarque')->add('Ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionEJBundle\Entity\Joueur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionejbundle_joueur';
    }


}
