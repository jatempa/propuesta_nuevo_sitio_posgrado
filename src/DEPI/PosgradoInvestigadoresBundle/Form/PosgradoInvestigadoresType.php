<?php

namespace DEPI\PosgradoInvestigadoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PosgradoInvestigadoresType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('posgrado')
            ->add('investigadores')
            ->add('guardar', 'submit', array('attr' => array('class' => 'btn btn-blue')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\PosgradoInvestigadoresBundle\Entity\PosgradoInvestigadores'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_posgradoinvestigadoresbundle_posgradoinvestigadores';
    }
}
