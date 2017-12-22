<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompositionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('composer', null, array(
                'attr' => array('class'=>'ui fluid dropdown')
            ))
            ->add('fullTitle')
            ->add('opus')
            ->add('compositionYear')
            ->add('collection', null, array(
                'attr' => array('class'=>'ui fluid dropdown')
            ))
            ->add('collectionPosition')
            ->add('tonality', null, array(
                'attr' => array('class'=>'ui fluid dropdown')
            ))
            ->add('instrumentation', null, array(
                'attr' => array('class'=>'ui fluid dropdown')
            ))
            ->add('transcriber', null, array(
                'attr' => array('class'=>'ui fluid dropdown')
            ))
            ->add('initialInstrumentation', null, array(
                'attr' => array('class'=>'ui fluid dropdown')
            ))
            ->add('duration', null, array(
                'label' => 'Duration (minutes)'
            ))
            ->add('musicalForm', null, array(
                'attr' => array('class'=>'ui fluid dropdown')
            ))
            ->add('theme')
            ->add('additionalInfo')
            ->add('toBeRecorded', null, array(
                'attr' => array('class'=>'ui slider checkbox')
            ))
            ->add('status', null, array(
                'attr' => array('class'=>'ui fluid dropdown')
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Composition'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_composition';
    }


}
