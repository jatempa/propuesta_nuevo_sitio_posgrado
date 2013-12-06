<?php

namespace DEPI\InvestigadoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvestigadoresType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidoPaterno')
            ->add('apellidoMaterno', 'text', array('required' => false))
            ->add('email')
            ->add('telefono', 'text', array('required' => false))
            ->add('grado', 'text', array('required' => false))
            ->add('sni', 'text', array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\InvestigadoresBundle\Entity\Investigadores'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_investigadoresbundle_investigadores';
    }
}
