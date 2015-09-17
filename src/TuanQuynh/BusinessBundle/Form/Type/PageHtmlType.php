<?php

namespace TuanQuynh\BusinessBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageHtmlType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('attr' => array('autofocus' => true)))
            ->add('slug', 'text', array('attr'=>array('help'=>'Show in url for friendly url')))
            ->add('content', 'textarea', array('required' => true))
            ->add('isActive', 'checkbox', array('required' => false))
            ->add('save', 'submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TuanQuynh\BusinessBundle\Entity\PageHtml',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'businessbundle_pagehtml';
    }
}
