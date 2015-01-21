<?php

namespace VVM\CyclovoyageurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoyageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('destination')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('etapes')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VVM\CyclovoyageurBundle\Entity\Voyage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vvm_cyclovoyageurbundle_voyage';
    }
}
