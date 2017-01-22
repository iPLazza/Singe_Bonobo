<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('age', TextType::class)
                ->add('famille', TextType::class)
                ->add('race', TextType::class)
                ->add('nourriture', TextType::class)
                ->add('Valider', submitType::class);
    }


    public function getName()
    {
        return 'user';
    }
}
