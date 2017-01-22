<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('age',TextType::class)
                ->add('famille',TextType::class)
                ->add('race',TextType::class)
                ->add('nourriture',TextType::class)
                ->add('Valider',SubmitType::class);
    }

    public function getName()
    {
        return 'user';
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'label' => false,
            'attr' => array(
                'class' => 'sky-form'
            ),
        ));
    }
}
