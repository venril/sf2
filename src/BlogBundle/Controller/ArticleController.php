<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Form\Type\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $article = new Article();
        $articleType = new ArticleType();
        $form = $this->createForm($articleType,$article);
        
        $handler = new CategoryHandler($form, $request, $em);
        if($handler->process()){
            $em->flush();
            $this->addFlash('success', 'Catégorie ajouté avec succès');
            return $this->redirect($this->generateUrl('blog_homepage'));
        }
        return $this->render('BlogBundle:Article:index.html.twig', array(
            'title' => 'articles',
            'articles' => $articles
        ));
    }
    
    public function addAction(Request $request)
    {
        $article = new Article();
        $articleType = new ArticleType();
        
        $form = $this->createForm($articleType, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            $this->addFlash('success', 'Article ajouté avec succès');
            return $this->redirect($this->generateUrl('blog_homepage'));
        }
        
        return $this->render('BlogBundle:Article:form.html.twig', array(
            'title' => 'Ajouter un article',
            'form' => $form->createView(),
        ));
    }
    
    public function updateAction(Request $request)
    {
        return $this->render('BlogBundle:Article:form.html.twig');
    }
    
    public function deleteAction(Request $request)
    {
        return $this->render('BlogBundle:Article:index.html.twig');
    }
}
