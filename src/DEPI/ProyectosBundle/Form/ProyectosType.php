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
            ->add('nombreCorto', 'text')
            ->add('nombreCompleto', 'text')
            ->add('objetivoGeneral', 'text')
            ->add('objetivosEspecificos', 'textarea', array('attr' => array('rows' => '6')))
            ->add('fechaApertura', 'date', array('widget' => 'single_text'))
            ->add('fechaTermino', 'date', array('widget' => 'single_text'))
            ->add('claveA', 'text')
            ->add('claveB', 'text', array('required' => false))
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
