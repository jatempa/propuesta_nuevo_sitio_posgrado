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
            ->add('claveItm', 'text')
            ->add('claveConacyt', 'text')
            ->add('claveDgest', 'text')
            ->add('nombreCorto', 'text')
            ->add('nombreCompleto', 'text')
            ->add('objetivoGeneral', 'text')
            ->add('objetivosEspecificos', 'textarea')
            ->add('fechaApertura', 'genemu_jquerydate', array('widget' => 'single_text'))
            ->add('fechaTermino', 'genemu_jquerydate', array('widget' => 'single_text'))
            ->add('status', 'checkbox')
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
