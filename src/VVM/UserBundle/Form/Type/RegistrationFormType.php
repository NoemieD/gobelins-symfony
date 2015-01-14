<?php

namespace VVM\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    protected $role_hierarchy;

    public function __construct($class, $role_hierarchy)
    {
        parent::__construct($class);

        $this->role_hierarchy = $role_hierarchy;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('roles', 'choice', array(
            'label' => 'Role',
            'choices' => $this->role_hierarchy,
            'multiple' => true
        ));
    }

    public function getName()
    {
        return 'vvm_user_registration';
    }
}