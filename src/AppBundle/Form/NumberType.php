<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use AppBundle\Entity\Film;
use AppBundle\Entity\Quotation;
use AppBundle\Entity\Thesaurus;

use AppBundle\Repository\FilmRepository;
use AppBundle\Repository\QuotationRepository;
use AppBundle\Repository\ThesaurusRepository;

class NumberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //title
            ->add('title', TextType::class, array(
                    // 'data' => "Test", 
                ))
            ->add('film', EntityType::class, array(
                'placeholder' => 'Choose a Film',
                'class' => 'AppBundle:Film',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(FilmRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                },
                //'disabled' => true, //mais false si admin?
            ))
            ->add('validationTitle', ChoiceType::class, [
                'choices' => [
                    //créer un repository pour validation?
                    'No validation' => 0,
                    'Validation 1' => 1,
                    'Validation 2' => 3,
                ]  
                ])

            //length
            ->add('beginTc') // convertir en min/secondes
            ->add('endTc') // convertir en min/secondes
            // ->add('length') //doit être calculé automatiquement
            // Begin (Thesaurus)
            ->add('beginThesaurus', EntityType::class, array(
                'placeholder' => 'Choose a Begin Type',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllBegin();
                },
            ))
            //Ending (Thesaurus)
            ->add('endingThesaurus', EntityType::class, array(
                'placeholder' => 'Choose an Ending Type',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllEnding();
                },
            ))
            //->add('completeness') //problème ajout add new 
            ->add('validationTc', ChoiceType::class, [
                'choices' => [
                    //créer un repository pour validation?
                    'No validation' => 0,
                    'Validation 1' => 1,
                    'Validation 2' => 3,
                ]  
                ])

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
            // ->add('quotation')
            ->add('quotation', EntityType::class, array(
                'placeholder' => 'Choose a Quotation',
                'class' => 'AppBundle:Quotation',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(QuotationRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                },
                //'disabled' => true, //mais false si admin?
            ))
            ->add('validationReference')

            //???
            ->add('lyrics')
            // ->add('timestamp')

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
