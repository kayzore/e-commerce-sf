<?php

namespace Kay\Bundle\PlatformBundle\Form;

use Kay\Bundle\TagBundle\Form\Type\TagsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('introduction')
            ->add('imageName')
            ->add('category')
            ->add('tags', TagsType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kay\Bundle\PlatformBundle\Entity\Courses'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kay_bundle_platformbundle_courses';
    }


}
