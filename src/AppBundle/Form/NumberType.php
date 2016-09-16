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
                // 'placeholder' => 'Choose a Film',
                'class' => 'AppBundle:Film',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(FilmRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }//,
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

            ->add('beginThesaurus', EntityType::class, array(
                // 'placeholder' => 'Choose a Begin Type',
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
//            ->add('completeness') //problème ajout add new - ne se sauvegarde pas
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
            ->add('validationStructure')

            //Shots
            ->add('shots')
            ->add('validationShots')

            //Performers
            ->add('performers')
            ->add('figurants')
            ->add('performance_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title',
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("performance");
                }
            ))
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
            ->add('diegeticPlace')
//            ->add('socialPlace') //pb pour le set au moment du flush
            ->add('imaginary')
//            ->add('exoticism')
            ->add('exoticism_thesaurus')
            ->add('validationTheme')

            //Mood
            // ->add('mood') relation à reprendre (many to many)
            ->add('source_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("mood");
                }
            ))
            ->add('validationMood')

            //Dance
            ->add('choregraphers')
            //ensemble type dancing
            //type of dancing
            ->add('dancemble', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("musensemble");
                }// il faudra ne prendre que ceux de type dance
            ))
            ->add('dance', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("dance");
                }// diviser par type ensuite
            ))
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
            ->add('tempo')
            ->add('musical')
            ->add('arrangers')
            ->add('arrangerComment')
            ->add('validationMusic')

            //Director
            //??? person si ce n'est pas lui qui a réalisé le film

            //Complement
            ->add('director')
            ->add('cost')
            ->add('costComment')
            ->add('validationCost')

            //Reference
            ->add('quotation')
            ->add('quotation_text')
            //->add('source')
            ->add('source_thesaurus', EntityType::class, array(
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("source");
                }
            ))
            ->add('validationReference')

            //???
            ->add('lyrics')
            ->add('timestamp') //https://github.com/Atlantic18/DoctrineExtensions/blob/master/doc/timestampable.md
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
