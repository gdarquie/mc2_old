<?php

namespace AppBundle\Form;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use AppBundle\Repository\ThesaurusRepository;

class SearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //title
            ->add('source_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'placeholder' => "",
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("source");
                }
            ))
            ->add('performance_thesaurus', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("performance");
                }
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Number',
        ));
    }
}
