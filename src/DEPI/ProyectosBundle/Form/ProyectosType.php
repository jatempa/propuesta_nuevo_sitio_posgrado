<?php

namespace DEPI\ProyectosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProyectosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clave_itm')
            ->add('clave_conacyt')
            ->add('clave_dgest')
            ->add('nombre_corto')
            ->add('nombre_completo')
            ->add('descripcion')
            ->add('fecha_apertura')
            ->add('status')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\ProyectosBundle\Entity\Proyectos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_proyectosbundle_proyectos';
    }
}
