<?php

namespace MassAPIBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostalAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('addressCountry', EntityType::class, array(
                'class'    => 'MassAPIBundle\Entity\Country',
                'property' => 'name',
            ))
            ->add('addressLocality')
            ->add('addressRegion')
            ->add('postalCode')
            ->add('postOfficeBoxNumber')
            ->add('streetAddress')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MassAPIBundle\Entity\PostalAddress'
        ));
    }

    public function getName()
    {
        return 'mass_api_postal_address';
    }
}
