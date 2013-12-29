<?php

namespace DEPI\InvestigadoresLineasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvestigadoresLineasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rol', 'choice', array('choices' => array('Responsable' => 'Responsable', 'Participante' => 'Participante')))
            ->add('investigadores')
            ->add('lineasinvestigacion')
            ->add('guardar', 'submit', array('attr' => array('class' => 'btn btn-blue')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\InvestigadoresLineasBundle\Entity\InvestigadoresLineas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_investigadoreslineasbundle_investigadoreslineas';
    }
}
