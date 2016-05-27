<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('notes')
            ->add('idImdb')
            ->add('studio')
            ->add('distributor')
            ->add('color')
            ->add('ratio')
            ->add('length')
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
            ->add('deleted')
            ->add('adaptation')
            ->add('remake')
            ->add('song')
            ->add('numberMedley')
            ->add('numberCompletenessIdcompleteness')
            ->add('numberEnsembleMusic')
            ->add('numberEnsembleDance')
            ->add('verdict')
            ->add('pcaTexte')
            ->add('legion')
            ->add('protestant')
            ->add('harrisson')
            ->add('bord')
            ->add('underscoring')
            ->add('state')
            ->add('censorship')
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
