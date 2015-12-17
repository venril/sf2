<?php

namespace BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',null,array('label' => 'blog_category_form_title'))
                ->add('save', 'submit', array(
                    'label' => 'Sauvegarder',
                    'attr' => array('class' => 'btn-primary')
                        )
        );
    }

}
