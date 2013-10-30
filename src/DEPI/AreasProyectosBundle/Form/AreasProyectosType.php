<?php

namespace DEPI\AreasProyectosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AreasProyectosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('proyecto')
            ->add('area')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\AreasProyectosBundle\Entity\AreasProyectos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_areasproyectosbundle_areasproyectos';
    }
}
