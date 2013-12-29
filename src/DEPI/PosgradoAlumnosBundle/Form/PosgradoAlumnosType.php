<?php

namespace DEPI\PosgradoAlumnosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PosgradoAlumnosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('posgrado')
            ->add('alumno')
            ->add('guardar', 'submit', array('attr' => array('class' => 'btn btn-blue')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\PosgradoAlumnosBundle\Entity\PosgradoAlumnos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_posgradoalumnosbundle_posgradoalumnos';
    }
}
