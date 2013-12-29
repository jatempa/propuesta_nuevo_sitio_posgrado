<?php

namespace DEPI\AlumnosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlumnosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('noControl', 'text')
            ->add('nombre', 'text')
            ->add('apellidoPaterno', 'text')
            ->add('apellidoMaterno', 'text', array('required' => false))
            ->add('email', 'email')
            ->add('telefono', 'text', array('required' => false))
            ->add('foto', 'file', array('required' => false))
            ->add('guardar', 'submit', array('attr' => array('class' => 'btn btn-blue')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\AlumnosBundle\Entity\Alumnos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_alumnosbundle_alumnos';
    }
}
