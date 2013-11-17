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
            ->add('cantidad')
            ->add('fechaCumplimiento')
            ->add('observaciones','textarea', array('attr' => array('cols' => '80', 'rows' => '8')))
            ->add('proyecto')
            ->add('productoAcademico')
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
