<?php

namespace Wypozyczalnia\TestBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;


class RegisterType extends AbstractType {
    
    public function getName() {
        return 'register_form';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array(
                    'label' => 'Login'  
                ))
                ->add('email', 'email', array(
                    'label' => 'Email'
                ))
                ->add('birthdate', 'birthday', array(
                    'label' => 'Data urodzenia',
                    'empty_value' => '--',
                    'empty_data' => NULL
                ))
                ->add('country', 'country', array(
                    'label' => 'Kraj',
                    'empty_value' => '--',
                    'empty_data' => NULL
                ))
                ->add('password', 'password', array(
                    'label' => 'Hasło'
                ))
                ->add('save', 'submit', array(
                    'label' => 'Zapisz',
                ));
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Wypozyczalnia\TestBundle\Entity\Register'
        ));
    }

}
