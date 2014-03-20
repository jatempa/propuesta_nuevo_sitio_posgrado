<?php

namespace DEPI\InvestigadoresProyectosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvestigadoresProyectosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('investigador')
            ->add('proyecto')
            ->add('guardar', 'submit', array('attr' => array('class' => 'btn btn-blue')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\InvestigadoresProyectosBundle\Entity\InvestigadoresProyectos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_investigadoresproyectosbundle_investigadoresproyectos';
    }
}
