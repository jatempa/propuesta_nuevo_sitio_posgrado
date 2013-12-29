<?php

namespace DEPI\ProyectosProductosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProyectosProductosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad', 'integer', array('required' => false))
            ->add('fechaCumplimiento', 'date', array('widget' => 'single_text'))
            ->add('observaciones','textarea', array('required' => false, 'attr' => array('rows' => '6')))
            ->add('proyecto')
            ->add('productoAcademico')
            ->add('guardar', 'submit', array('attr' => array('class' => 'btn btn-blue')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\ProyectosProductosBundle\Entity\ProyectosProductos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_proyectosproductosbundle_proyectosproductos';
    }
}
