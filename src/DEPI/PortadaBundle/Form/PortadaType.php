<?php

namespace DEPI\PortadaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PortadaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', 'text', array('required' => false))
            ->add('foto', 'file', array('required' => false))
            ->add('fechaPublicacion', 'date', array('widget' => 'single_text'))
            ->add('guardar', 'submit', array('attr' => array('class' => 'btn btn-blue')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\PortadaBundle\Entity\Portada'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_portadabundle_portada';
    }
}
