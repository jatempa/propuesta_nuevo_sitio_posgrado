<?php

namespace DEPI\LineasInvestigacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LineasInvestigacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clave')
            ->add('nombre')
            ->add('descripcion', 'textarea', array('required' => false, 'attr' => array('rows' => '6')))
            ->add('guardar', 'submit', array('attr' => array('class' => 'btn btn-blue')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_lineasinvestigacionbundle_lineasinvestigacion';
    }
}
