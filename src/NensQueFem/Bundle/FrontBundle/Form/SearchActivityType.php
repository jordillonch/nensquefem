<?php

namespace NensQueFem\Bundle\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $date_to_obj = new \DateTime("now");
        $date_to_obj->modify('+7 days');
        $builder
            ->add('category', 'entity', array(
                'label' => 'Categoria',
                'multiple' => true,
                'required' => false,
                'class' => 'NensQueFemCoreBundle:Category',
                'property' => 'name'
            ))
            ->add('city', 'entity', array(
                'label' => 'Ciutat',
                'multiple' => true,
                'required' => false,
                'class' => 'NensQueFemCoreBundle:City',
                'property' => 'name'
            ))
            ->add('date_from', 'date', array(
                'label' => 'Data des de',
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd-MM-yy',
                'data' => new \DateTime("now")
            ))
            ->add('date_to', 'date', array(
                'label' => 'Data fins a',
                'widget' => 'single_text',
                'format' => 'dd-MM-yy',
                'required' => false,
                'data' => $date_to_obj))
            ->add('years', 'choice', array('multiple' => true,
                'label' => 'Edats',
                'required' => false,
                'choices' => array('0-3' => '0-3', '3-6' => '3-6', '7-10' => '7-10', '10-999' => '+10'),
            ));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }

    public function getName()
    {
        return 'nqf_search_activity_type';
    }
}
