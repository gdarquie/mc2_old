<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ThesaurusType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('type' , TextType::class)
            ->add('comment', TextType::class, array('required'=> false))
            // ->add('link', TextType::class, array('required'=> false))
            ->add('example', TextType::class, array('required'=> false))
            ->add('definition', TextType::class, array('required'=> false))
            ->add('category', TextType::class, array('required'=> false))
            // ->add('timestamp', TextType::class, array('data' => date('d/m/Y h:m:s'), 'required' => false))
            ->add('save', SubmitType::class, array('label' => 'Create Thesaurus'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Thesaurus'
        ));
    }
}
