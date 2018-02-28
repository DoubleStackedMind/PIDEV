<?php

namespace GestionEJBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\NumberTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutEquipe extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('capital')->add('participations',NumberType::class)->add('continent')->add('victoires',NumberType::class)->add('entraineur')->add('classementfifa',NumberType::class)->add('matchescm',NumberType::class)->add('butscm',NumberType::class)->add('matchwins',NumberType::class)->add('matchlosses',NumberType::class)->add('matchdraws',NumberType::class)->add('drapeau',FileType::class)->add('photoequipe',FileType::class)->add('Ajout Equipe',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionEJBundle\Entity\Equipe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionejbundle_equipe';
    }


}
