<?php

namespace DEPI\AlumnosProyectosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlumnosProyectosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idAlumno')
            ->add('idProyecto')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\AlumnosProyectosBundle\Entity\AlumnosProyectos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_alumnosproyectosbundle_alumnosproyectos';
    }
}
