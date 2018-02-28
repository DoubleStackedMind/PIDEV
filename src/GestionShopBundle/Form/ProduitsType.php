<?php

namespace GestionShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder ->add('Nom')
           ->add('Prix')
           ->add('Categorie')
           ->add('Quantite')
           ->add('File',FileType::class)
       ->add('Ajouter',SubmitType::class);
           }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gestion_shop_bundle_produits_type';
    }
}
