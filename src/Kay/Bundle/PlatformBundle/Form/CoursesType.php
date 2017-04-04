<?php

namespace Kay\Bundle\PlatformBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Kay\Bundle\TagBundle\Form\Type\TagsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
            ->add('title', TextType::class, array(
                'label' => 'Titre'
            ))
            ->add('introduction', TextareaType::class, array(
                'label' => 'Introduction',
                'attr'  => array(
                    'class' => 'tinymce'
                )
            ))
            ->add('imageName')
            ->add('category')
            ->add('tags', TagsType::class, array(
                'label' => 'Tags'
            ))
            ->add('chapters', CollectionType::class, array(
                'label'         => 'Chapitres',
                'type'          => new ChapterType(),
                'allow_add'     => true,
                'allow_delete'  => true
            ))
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
