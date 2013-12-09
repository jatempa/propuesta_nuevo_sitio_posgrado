<?php

namespace DEPI\PosgradoAreasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PosgradoAreasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('posgrado')
            ->add('area')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DEPI\PosgradoAreasBundle\Entity\PosgradoAreas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'depi_posgradoareasbundle_posgradoareas';
    }
}
