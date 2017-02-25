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
use AppBundle\Repository\ThesaurusRepository;
use AppBundle\Repository\StageshowRepository;

use AppBundle\Entity\Stageshow;
use AppBundle\Entity\Thesaurus;

use AppBundle\Entity\Film;

class FilmType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('productionyear')
            ->add('released')
            ->add('idImdb')
            ->add('length')
            ->add('distributors')
            ->add('color')
            ->add('ratio')
            ->add('contract')
            ->add('rights')
            ->add('negative')
            ->add('pna')
            ->add('usRentals')
            ->add('foreignRentals')
            ->add('totalRentals')
            ->add('usBoxoffice')
            ->add('foreignBoxoffice')
            ->add('totalBoxoffice')
            ->add('sourceEco')
            ->add('archives')
//            ->add('deleted')
            ->add('adaptation', EntityType::class, array(
                'placeholder' => '',
                'class' => 'AppBundle:Thesaurus',
                'choice_label' => 'title', //order by alpha
                'query_builder' => function(ThesaurusRepository $repo) {
                    return $repo->findAllThesaurusByType("adaptation");
                },
                'empty_data' => null,
            ))
            ->add('stageshows')
            ->add('remake')
            ->add('pcaTexte')
            ->add('protestant')
            ->add('harrisson')
            ->add('bord')
            ->add('underscoring')
            ->add('censorship') //à remettre
            ->add('directors')
            ->add('verdict', ChoiceType::class, array(
            'choices'  => array(
                'acceptable' => "acceptable",
                'basically acceptable with minor changes' => "basically acceptable with minor changes",
                'missing information' => "missing information",
                "no explicit verdict - major problems about the show" => "no explicit verdict - major problems about the show",
                "other" => "other",
                "unacceptable" => "unacceptable"
            )))
            ->add('legion', ChoiceType::class, array(
                'choices'  => array(
                    '?' => "?",
                    'A1' => "A1",
                    'A2' => "A2",
                    "A3" => "A3",
                    "B" => "B",
                    "NA" => "NA"
                )))
            ->add('producers')
//            ->add('isComplete')
            ->add('studios')
            ->add('state')

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Film'
        ));
    }
}