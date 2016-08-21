<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NumberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            // ->add('film')

            //title
            ->add('title', TextType::class)
            ->add('validationTitle')

            //length
            ->add('beginTc')
            ->add('endTc')
            // ->add('length') //doit être calculé automatiquement
            ->add('begin')
            ->add('ending')
            ->add('completeness')
            ->add('validationTc')

            //structure
            //->add('structure')
            ->add('validationStructure')

            //Shots
            ->add('shots')
            ->add('validationShots')

            //Performers
            //person avec le job de performer
            //person avec le job de figurant
            ->add('performance')
            ->add('validationPerformance')

            //Backstage
            ->add('spectators')
            ->add('diegetic')
            ->add('musician')
            ->add('integration')
            ->add('validationBackstage')
            
            //Themes
            //->add('costumes') problème de relation
            // ->add('stereotypes') ??? make up change de nom?
            //->add('diegeticPlaces') ???
            //->add('socialPlace') //pb pour le set au moment du flush
            ->add('imaginary')
            ->add('exoticism')
            ->add('validationTheme')

            //Mood
            // ->add('mood') relation à reprendre (many to many)
            ->add('validationMood')

            //Dance
            //person -> choregraphe
            //ensemble type dancing
            //type of dancing
            ->add('validationDance')

            //Music
            ->add('song')
            // ->add('musensemble') ???
            ->add('dubbing')
            ->add('tempo')
            ->add('musical')
            // ->add('arranger') ???
            ->add('arrangerComment')
            ->add('validationMusic')

            //Director
            //??? person si ce n'est pas lui qui a réalisé le film

            //Complement
            ->add('cost')
            ->add('costComment')

            //Reference
            // ->add('sources')
            ->add('quotation')
            ->add('validationReference')


            ->add('lyrics')


            // ->add('save', SubmitType::class, array('label' => 'Save Number'))
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
