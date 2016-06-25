<?php

namespace MassAPIBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address', PostalAddressType::class)
            ->add('faxNumber')

            ->add('containedInPlace', EntityType::class, array(
                'class'    => 'MassAPIBundle\Entity\Place',
                'property' => 'name',
            ))
            ->add('containsPlace', EntityType::class, array(
                'class'    => 'MassAPIBundle\Entity\Place',
                'property' => 'name',
            ))

            ->add('geo')
            ->add('globalLocationNumber')
            ->add('hasMap')

            ->add('logo')
            ->add('photo')

            ->add('openingHoursSpecification')
            ->add('specialOpeningHoursSpecification')

            ->add('aggregateRating')
            ->add('review')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MassAPIBundle\Entity\Place'
        ));
    }

    public function getName()
    {
        return 'mass_api_place';
    }
}