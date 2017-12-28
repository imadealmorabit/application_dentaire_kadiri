<?php

namespace Kadiri\KadiriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class commande_newType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medecin', EntityType::class, array(
                    'class'        => 'KadiriBundle:medecin',
                    'choice_label' => 'identifiant',
                    'multiple'     => false,
                ))
            ->add('Produits', EntityType::class, array(
                    'class'        => 'KadiriBundle:Produits',
                    'choice_label' => 'designation',
                    'multiple'     => true,
                ))
            ->add('quantite')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kadiri\KadiriBundle\Entity\commande'
        ));
    }
}