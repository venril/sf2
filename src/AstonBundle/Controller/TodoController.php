<?php

namespace AstonBundle\Controller;

use AstonBundle\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TodoController extends Controller {

    public function indexAction()
    {
        
        $repo = $this->getDoctrine()->getManager()->getRepository('AstonBundle:Todo');
        $tasks = $repo->findAll();
        if (!$tasks){
            throw $this->createNotFoundException('Tasks not Found');
        }
        
        return $this->render('AstonBundle:Todo:index.html.twig',array(
            'tasks' => $tasks,
        ));
        
    }

    public function addAction(Request $request)
    {
        $todo = new Todo;
        $fb = $this->createFormBuilder($todo);
        $fb->add('txt')
           ->add('done')
           ->add('save','submit',array(
              'label' => 'Sauvegarder'
              ));
        $form = $fb->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            $this->addFlash('success', 'Tache ajoutée avec succès');
            return $this->redirect($this->generateUrl('aston_todo'));
        }
        return $this->render('AstonBundle:Todo:form.html.twig', array(
            
            'form' => $form->createView()));
    }

    public function updateAction()
    {

        return $this->render('AstonBundle:Todo:form.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('AstonBundle:Todo:index.html.twig');
    }

}
