<?php

namespace AppBundle\Form;

use Doctrine\ORM\Mapping\Entity;
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
use AppBundle\Entity\Song;
use AppBundle\Entity\Thesaurus;

use AppBundle\Repository\FilmRepository;
use AppBundle\Repository\PersonRepository;
use AppBundle\Repository\SongRepository;
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
//            ->add('film', EntityType::class, array(
//                'class' => 'AppBundle:Film',
////                'placeholder' => "Choose a film", //choisir automatiquement le film associé
//                'choice_label' => 'title', //order by alpha + ajouter released
////                'choice_label' => function(){ return title}
//                'query_builder' => function(FilmRepository $repo) {
////                    return $repo->createAlphabeticalQueryBuilder();
//                    return $repo->findFilmNumber(3839);
//
//                },
//                'disabled' => true,
//                'empty_data'  => null
//
//                //'disabled' => true, //mais false si admin?
//            ))
            ->add('commentTitle')
            ->add('completeTitle', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                    ]
            ])
//            ->add('validationTitle', ChoiceType::class, [
//                'choices' => [
//                    //créer un repository pour validation?
//                    // <option value="" disabled selected>Choose your option</option> http://materializecss.com/forms.html
//                    'No validation' => 0,
//                    'Validation 1' => 1,
//                    'Validation 2' => 3,
//                ]
//                ])

            //length
            ->add('beginTc') // convertir en min/secondes
            ->add('endTc') // convertir en min/secondes

            ->add('beginThesaurus', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("begin");
                },
                'empty_data' => null,
            ))
            //Ending (Thesaurus)
            ->add('endingThesaurus', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("ending");
                },
                'empty_data' => null
            ))
            ->add('completenessThesaurus', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("completeness");
                }
            ))
            ->add('completOptions', EntityType::class, array(
                'placeholder' => '',
                'multiple' => true,
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("completOptions");
                }
            ))
            ->add('commentTc')
            ->add('completeTc', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationTc', ChoiceType::class, [
//                'choices' => [
//                    //créer un repository pour validation?
//                    'No validation' => 0,
//                    'Validation 1' => 1,
//                    'Validation 2' => 3,
//                ]
//                ])

            //structure
            ->add('structure', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("structure");
                }
            ))
            ->add('commentStructure')
            ->add('completeStructure', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationStructure')

            //Shots
            ->add('shots')
            ->add('commentShots')
            ->add('completeShots', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationShots')

            //Performers
            ->add('performers'
                , EntityType::class, array(
                'class' => 'AppBundle:Person',
                'multiple' => true,
//                'empty_data' => null,
                'choice_label' => 'name',
                'query_builder' => function(PersonRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
                )
            )
            ->add('figurants', EntityType::class, array(
                'class' => 'AppBundle:Person',
                'multiple' => true,
                'choice_label' => 'name',
                'query_builder' => function(PersonRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
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
            ->add('commentPerformance')
            ->add('completePerformance', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationPerformance')

            //Backstage
            //->add('spectators')
            ->add('spectators_thesaurus', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("spectators");
                }
            ))
            //->add('diegtic',)
            ->add('diegetic_thesaurus', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("diegetic");
                }
            ))
            //->add('musician')
            ->add('musician_thesaurus', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("musician");
                }
            ))
            //->add('integration')
//            ->add('integration_thesaurus', EntityType::class, array(
//                'placeholder' => '',
//                'class' => 'AppBundle:Thesaurus',
//                'choice_label' => 'title', //order by alpha
//                'query_builder' => function(ThesaurusRepository $repo) {
//                    return $repo->findAllThesaurusByType("integration");
//                }
//            ))
//            ->add('integoptions', EntityType::class, array(
//                'class' => 'AppBundle:Thesaurus',
//                'multiple' => true,
//                'choice_label' => 'title', //order by alpha
//                'query_builder' => function(ThesaurusRepository $repo) {
//                    return $repo->findAllThesaurusByType("integoptions");
//                }
//            ))
            ->add('commentBackstage')
            ->add('completeBackstage', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationBackstage')
            
            //Themes
            ->add('costumes', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("costumes");
                },
                'required'    => false,
                'empty_data'  => null
            ))


            ->add('stereotype', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("Ethnic stereotypes");
                }
            ))
            ->add('diegetic_place_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'multiple' => true,
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("diegetic place");
                }
            ))
            ->add('general_localisation', EntityType::class, array(

                'class' => 'AppBundle:Thesaurus',
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("general localisation");
                }
            ))
            ->add('imaginary', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("imaginary place");
                }
            ))
//            ->add('exoticism')
            ->add('exoticism_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("exoticism");
                }
            ))
            ->add('commentTheme')
            ->add('completeTheme', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationTheme')

            //Mood
            ->add('general_mood', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("mood", "general");
                }// diviser par type ensuite
            ))
            ->add('genre', EntityType::class, array(
                'multiple' => true,
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("mood", "genre");
                }// diviser par type ensuite
            ))
            ->add('commentMood')
            ->add('completeMood', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationMood')

            //Dance
            ->add('choregraphers', EntityType::class, array(
                'class' => 'AppBundle:Person',
                'multiple' => true,
                'choice_label' => 'name',
                'query_builder' => function(PersonRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ))
            //ensemble type dancing
            //type of dancing
            ->add('dancemble', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'multiple' => true,
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("dancemble");
                }// il faudra ne prendre que ceux de type dance
            ))
            ->add('dancingType', EntityType::class, array(
                'multiple' => true,
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("dance", "Dancing type");
                }
            ))
            ->add('danceSubgenre', EntityType::class, array(
                'multiple' => true,
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("dance", "Dance sub-genre");
                }
            ))
            ->add('danceContent', EntityType::class, array(
                'multiple' => true,
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByTypeAndCategory("dance", "Dance content");
                }
            ))
            ->add('commentDance')
            ->add('completeDance', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationDance')

            //Music
                //todo : mettre les songs par ordre alpha + enlever placehodler
            ->add('song', EntityType::class, array(
                'class' => 'AppBundle:Song',
                'multiple' => true,
                'empty_data' => null,
                'choice_label' => 'title',
                'query_builder' => function(SongRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                },
            ))
            ->add('musensemble', EntityType::class, array(
                'multiple' => true,
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("musensemble");
                }//il faudra ne prendre que ceux de type music
            ))
            ->add('dubbing')
//            ->add('tempo')
            ->add('tempo_thesaurus', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("tempo");
                }//il faudra ne prendre que ceux de type music
            ))
            ->add('musical_thesaurus', EntityType::class, array(
                    'multiple' => true,
                    'class' => 'AppBundle:Thesaurus',
                    'choice_label' => 'title', //order by alpha
                    'query_builder' => function(ThesaurusRepository $repo) {
                        return $repo->findAllThesaurusByType("musical styles");
                    }//il faudra ne prendre que ceux de type music
                ))
            ->add('arrangers', EntityType::class, array(
                'class' => 'AppBundle:Person',
                'multiple' => true,
                'choice_label' => 'name',
                'query_builder' => function(PersonRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ))
            ->add('arrangerComment')
            ->add('commentMusic')
            ->add('completeMusic', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationMusic')


            //Complement
            ->add('director', EntityType::class, array(
                'class' => 'AppBundle:Person',
                'multiple' => true,
                'choice_label' => 'name',
                'query_builder' => function(PersonRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ))
            ->add('cost')
            ->add('costComment')
            ->add('commentDirector')
            ->add('completeDirector', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationCost')

            //Reference
            ->add('quotation_thesaurus', EntityType::class, array(
                'multiple' => true,
                'class' => 'AppBundle:Thesaurus',
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("quotation");
                }
            ))
            ->add('quotation_text')
            //->add('source')
            ->add('source_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'placeholder' => "",
                'multiple' => true,
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("source");
                }
            ))
            ->add('commentReference')
            ->add('completeReference', ChoiceType::class, [
                'choices' =>[
                    "not complete" => 0,
                    "complete" => 1,
                    "complete for me but need help" => 2,
                ]
            ])
//            ->add('validationReference')
            ->add('lyrics')
            ->add('cast', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("cast");
                },
                'empty_data' => null,
            ))
            ->add('stagenumbers')



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
