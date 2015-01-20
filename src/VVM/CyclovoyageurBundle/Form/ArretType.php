<?php

namespace VVM\CyclovoyageurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArretType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('latitude')
            ->add('longitude')
            ->add('date')
            ->add('description')
            ->add('type')
            ->add('photo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VVM\CyclovoyageurBundle\Entity\Arret'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vvm_cyclovoyageurbundle_arret';
    }
}
