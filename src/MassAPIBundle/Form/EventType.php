<?php

namespace MassAPIBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location', EntityType::class, array(
                'class'    => 'MassAPIBundle\Entity\Place',
                'property' => 'name',
            ))

            ->add('name')
            ->add('description')
            ->add('eventStatus')
            ->add('inLanguage')
            ->add('typicalAgeRange')
            ->add('url')

            ->add('startDate', DateType::class, array(
                'widget' => 'single_text',
                'data' => new \DateTime(),
            ))
            ->add('endDate', DateType::class, array(
                'widget' => 'single_text',
                'data' => new \DateTime(),
            ))
            ->add('duration', EntityType::class, array(
                'class'    => 'MassAPIBundle\Entity\Duration',
                'property' => 'name',
            ))
            ->add('doorTime', DateType::class, array(
                'widget' => 'single_text',
                'data' => new \DateTime(),
            ))
            ->add('previousStartDate', DateType::class, array(
                'widget' => 'single_text',
                'data' => new \DateTime(),
            ))

            ->add('recordedIn')

            ->add('image')

            ->add('aggregateRating')
            ->add('review')

            ->add('actor')
            ->add('organizer')
            ->add('attendee')
            ->add('director')
            ->add('performer')

            ->add('subEvent')
            ->add('superEvent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MassAPIBundle\Entity\Event'
        ));
    }

    public function getName()
    {
        return 'mass_api_event';
    }
}
