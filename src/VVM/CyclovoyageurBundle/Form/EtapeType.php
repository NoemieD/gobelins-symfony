<?php

namespace VVM\CyclovoyageurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtapeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('startingPoint')
            ->add('endingPoint')
            ->add('arrets')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VVM\CyclovoyageurBundle\Entity\Etape'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vvm_cyclovoyageurbundle_etape';
    }
}
