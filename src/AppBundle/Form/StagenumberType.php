<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use AppBundle\Entity\Stagenumber;
use AppBundle\Form\StagenumberType;



class StagenumberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('order')
            ->add('type')
            ->add('costumes')
            ->add('musicals')
            ->add('dancingstyle')
            ->add('genre')
            ->add('characters')
            ->add('description')
            ->add('ibdb')
            ->add('setting')
            ->add('stageshow')
            ->add('number')
            ->add('song')
            ->add('dancemble')
            ->add('musensemble')
            ->add('choreographers')
            ->add('cast')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Stagenumber'
        ));
    }
}
