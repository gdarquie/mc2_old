<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NumberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('type')
            ->add('beginTc')
            ->add('endTc')
            ->add('length')
            ->add('begin')
            ->add('ending')
            ->add('spectators')
            ->add('musician')
            ->add('lyrics')
            ->add('dance')
            ->add('tempo')
            ->add('makeup')
            ->add('shots')
            ->add('order')
            ->add('integration2')
            ->add('weight')
            ->add('structure')
            ->add('diegetic')
            ->add('source')
            ->add('film')
            ->add('quotation')
            ->add('mood')
            ->add('song')
            ->add('place')
            ->add('stagenumber')
            ->add('socialplace')
            ->add('exoticism')
            ->add('ensemble')
            ->add('costumes')
            ->add('completeness')
            ->add('dancing')
            ->add('integration')
            ->add('musical')
            ->add('effects')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Number'
        ));
    }
}
