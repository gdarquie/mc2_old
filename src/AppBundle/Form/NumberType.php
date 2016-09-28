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
use AppBundle\Repository\PersonRepository;
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
                 //'placeholder' => 'Choose a Film',
                'class' => 'AppBundle:Film',
                'choice_label' => 'title', //order by alpha + ajouter released
//                'choice_label' => function(){ return title}
                'query_builder' => function(FilmRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                },

                //'disabled' => true, //mais false si admin?
            ))
            ->add('completeTitle')
            ->add('validationTitle', ChoiceType::class, [
                'choices' => [
                    //créer un repository pour validation?
                    // <option value="" disabled selected>Choose your option</option> http://materializecss.com/forms.html
                    'No validation' => 0,
                    'Validation 1' => 1,
                    'Validation 2' => 3,
                ]  
                ])

            //length
            ->add('beginTc') // convertir en min/secondes
            ->add('endTc') // convertir en min/secondes

            ->add('beginThesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("begin");
                }
            ))
            //Ending (Thesaurus)
            ->add('endingThesaurus', EntityType::class, array(

                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("ending");
                }
            ))
            ->add('completenessThesaurus', EntityType::class, array(
                // 'placeholder' => 'Choose a Begin Type',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("completeness");
                }
            ))
            ->add('completOptions', EntityType::class, array(
                // 'placeholder' => 'Choose a Begin Type',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("completOptions");
                }
            ))
            ->add('completeTc')
            ->add('validationTc', ChoiceType::class, [
                'choices' => [
                    //créer un repository pour validation?
                    'No validation' => 0,
                    'Validation 1' => 1,
                    'Validation 2' => 3,
                ]  
                ])

            //structure
            ->add('structure', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("structure");
                }
            ))
            ->add('completeStructure')
            ->add('validationStructure')

            //Shots
            ->add('shots')
            ->add('completeShots')
            ->add('validationShots')

            //Performers
            ->add('performers'
//                , EntityType::class, array(
//                'class' => 'AppBundle:Person',
//                'choice_label' => 'name',
//                'query_builder' => function(PersonRepository $repo) {
//                    return $repo->createAlphabeticalQueryBuilder();
//                }
//                )
            )
            ->add('figurants')
            ->add('performance_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("performance");
                }
            ))
            ->add('completePerformance')
            ->add('validationPerformance')

            //Backstage
            //->add('spectators')
            ->add('spectators_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("spectators");
                }
            ))
            //->add('diegtic',)
            ->add('diegetic_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("diegetic");
                }
            ))
            //->add('musician')
            ->add('musician_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("musician");
                }
            ))
            //->add('integration')
            ->add('integration_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("integration");
                }
            ))
            ->add('integoptions', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("integoptions");
                }
            ))
            ->add('completeBackstage')
            ->add('validationBackstage')
            
            //Themes
            ->add('costumes', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("costumes");
                }
            ))
            ->add('stereotype', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("Ethnic stereotypes");
                }
            ))
//            ->add('diegeticPlace')
            ->add('diegetic_place_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("diegetic place");
                }
            ))
            ->add('general_localisation', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("general localisation");
                }
            ))
            ->add('imaginary', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("imaginary place");
                }
            ))
//            ->add('exoticism')
            ->add('exoticism_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("exoticism");
                }
            ))
            ->add('completeTheme')
            ->add('validationTheme')

            //Mood
//            ->add('mood_thesaurus', EntityType::class, array(
//                'class' => 'AppBundle:Thesaurus',
//                'choice_label' => 'title', //order by alpha
//                'query_builder' => function(ThesaurusRepository $repo) {
//                    return $repo->findAllThesaurusByType("mood");
//                }
//            ))
            ->add('general_mood', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("mood", "general");
                }// diviser par type ensuite
            ))
            ->add('genre', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("mood", "genre");
                }// diviser par type ensuite
            ))
            ->add('completeMood')
            ->add('validationMood')

            //Dance
            ->add('choregraphers')
            //ensemble type dancing
            //type of dancing
            ->add('dancemble', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("dancemble");
                }// il faudra ne prendre que ceux de type dance
            ))
            ->add('dancingType', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("dance", "Dancing type");
                }// diviser par type ensuite
            ))
            ->add('danceSubgenre', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("dance", "Dance sub-genre");
                }// diviser par type ensuite
            ))
            ->add('danceContent', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("dance", "Dance content");
                }// diviser par type ensuite
            ))
            ->add('completeDance')
            ->add('validationDance')

            //Music
            ->add('song')
            ->add('musensemble', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("musensemble");
                }//il faudra ne prendre que ceux de type music
            ))
            ->add('dubbing')
//            ->add('tempo')
            ->add('tempo_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("tempo");
                }//il faudra ne prendre que ceux de type music
            ))
            ->add('musical')
            //add('musical_thesaurus')
            ->add('arrangers')
            ->add('arrangerComment')
            ->add('completeMusic')
            ->add('validationMusic')


            //Complement
            ->add('director')
            ->add('cost')
            ->add('costComment')
            ->add('completeCost')
            ->add('validationCost')

            //Reference
            ->add('quotation_thesaurus')
            ->add('quotation_text')
            //->add('source')
            ->add('source_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("source");
                }
            ))
            ->add('completeReference')
            ->add('validationReference')

            //???
            ->add('lyrics')
            ->add('timestamp', DateTimeType::class, array(
            )) //https://github.com/Atlantic18/DoctrineExtensions/blob/master/doc/timestampable.md
//            ->add('timestamp', DateTimeType::class, [
//                'widget' => 'single_text',
//                'attr' => ['class' => 'datepicker'] ,
//                'html5' => false,
//            ]) //format attendu yyyy-mm-dd

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
