<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComposerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('initials', null, array(
                'attr' => array('class'=>'small')
            ))
            ->add('surname')
            ->add('lastName')
            ->add('birthYear', null, array(
                'attr' => array('class'=>'small')
            ))
            ->add('birthMonth', null, array(
                'attr' => array('class'=>'small')
            ))
            ->add('birthDay', null, array(
                'attr' => array('class'=>'small')
            ))
            ->add('deathYear', null, array(
                'attr' => array('class'=>'small')
            ))
            ->add('deathMonth', null, array(
                'attr' => array('class'=>'small')
            ))
            ->add('deathDay', null, array(
                'attr' => array('class'=>'small')
            ))
            ->add('country')
            ->add('workIndexName', null, array(
                'attr' => array('class'=>'small')
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Composer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_composer';
    }


}
