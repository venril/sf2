<?php
namespace BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder->add('title',null,array('label' => 'blog_article_form_title'))
              ->add('category',null,array(
                  'placeholder' => '--'
              ))
              ->add('teaser',null,array('label' => 'blog_article_form_teaser'))
              ->add('content',null,array('label' => 'blog_article_form_content'))
              ->add('createdAt',null,array('label' => 'blog_article_form_creatAt'))
              ->add('btn','submit',array(
                  'label' => 'blog_article_btn_save',
                  'attr' => array(
                      'class' => 'btn btn-primary',
                  )
                   ));
    }

}