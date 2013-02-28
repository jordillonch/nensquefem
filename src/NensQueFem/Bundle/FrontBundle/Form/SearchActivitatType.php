<?php

namespace NensQueFem\Bundle\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;


class SearchActivitatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $date_to_obj = new \DateTime("now");
        $date_to_obj->modify('+1 month');
        $builder
            //ToDo BD
            ->add('category', 'choice', array(
                'multiple' => true,
                'required' => false,
                'choices' => array(
                    'animacio' => 'Animació', 'cinema' => 'Cinema',
                    'circ' => 'Circ', 'contes' => 'Contes',
                    'exposicio' => 'Exposició', 'jocs' => 'Jocs'),
            ))
            //ToDo BD
            ->add('city', 'choice', array(
                'multiple' => true,
                'required' => false,
                'choices' => array(
                    'barcelona' => 'Barcelona', 'girona' => 'Girona', 'tarragona' => 'Tarragona', 'lleida' => 'Lleida'),
                ))
            ->add('date_from', 'date', array(
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd-MM-yy',
                'data' => new \DateTime("now")))
            ->add('date_up', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yy',
                'required' => false,
                'data' => $date_to_obj))
            ->add('years', 'choice', array('multiple' => true,
                                            'required' => false,
                                            'choices' => array('0-3' => '0-3', '3-6' => '3-6', '7-10' => '7-10', '+10' => '+10'),
                                            ))
        ;

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }

    public function getName()
    {
        return 'nqffront_searchactivitattype';
    }
}
