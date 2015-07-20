<?php

namespace TuanQuynh\BusinessBundle\Form\Type;

use TuanQuynh\BusinessBundle\Form\Type\BaseFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageHtmlType extends BaseFormType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('slug')
            ->add('content')
            ->add('isActive')
            ->add('save', 'submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
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
