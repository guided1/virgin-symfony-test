<?php

namespace Virgin\ChannelGuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegionalisedChannelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('number')
            ->add('baseChannel')
            ->add('region')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Virgin\ChannelGuideBundle\Entity\RegionalisedChannel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'virgin_channelguidebundle_regionalisedchannel';
    }
}
