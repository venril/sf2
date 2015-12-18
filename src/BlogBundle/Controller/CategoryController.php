<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Category;
use BlogBundle\Form\Handler\CategoryHandler;
use BlogBundle\Form\Type\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller {

    public function indexAction()
    {
        $blogService = $this->get('blog');
        var_dump($blogService->sayHello());
        $repo = $this->getDoctrine()->getManager()->getRepository('BlogBundle:Category');
        
        $categories = $repo->findAll();
        if (!$categories){
            throw $this->createNotFoundException('Categories not Found(find)');
        }
        return $this->render('BlogBundle:Category:index.html.twig', array(
            'title' => 'Categories',
            'categories' => $categories,
        ));
    }

    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $category = new Category();
        $categoryType = new CategoryType();
         $handler = new CategoryHandler($request,$em);
        $handler->setForm($this->createForm($categoryType,$category));
        
       
        if($handler->process()){
          
            $this->addFlash('success', 'Catégorie ajouté avec succès');
            return $this->redirect($this->generateUrl('blog_category'));
        }
        
        
        
        
        return $this->render('BlogBundle:Category:form.html.twig', array(
            'title' => 'Nouvelle Categorie',
            'form' => $form->createView(),
        ));
    }
    
    public function updateAction(Request $request)
    {   
        $em = $this->getDoctrine()->getEntityManager();
        $category = new Category();
        $categoryType = new CategoryType();
        $form = $this->createForm($categoryType,$category);
        
        $handler = new CategoryHandler($request, $em);
        if($handler->process()){
            $em->flush();
            $this->addFlash('success', 'Catégorie mise à jour avec succès');
            return $this->redirect($this->generateUrl('blog_homepage'));
        }
        
        return $this->render('BlogBundle:Category:form.html.twig', array(
            'title' => 'Mise à jour d une Categorie',
            'form' => $form->createView(),
        ));
    }
    
    public function deleteAction(Request $request)
    {
        return $this->render('BlogBundle:Category:index.html.twig', array(
            'title' => 'Categorie a supprimer',
        ));
    }

}
