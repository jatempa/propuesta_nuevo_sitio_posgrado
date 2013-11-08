<?php

namespace DEPI\InvestigadorProyectoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvestigadorProyectoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_creacion')
            ->add('investigadores')
            ->add('Proyectos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\InvestigadorProyectoBundle\Entity\InvestigadorProyecto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_investigadorproyectobundle_investigadorproyecto';
    }
}
