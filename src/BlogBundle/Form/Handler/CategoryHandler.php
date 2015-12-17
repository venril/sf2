<?php
namespace BlogBundle\Form\Handler;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;



class CategoryHandler 
{
/*
 * @var em
 */
private $em;
/*
 * @var form
 */
private $form;
/*
 * @var request
 */
private $request;

public function __construct( Form $form, Request $request, EntityManager $em)
{
    $this->setEm($em);
    $this->setForm($form);
    $this->setRequest($request);
}

public function process()
{
    $this->getForm()->handleRequest($this->getRequest());
    if($this->getRequest()->isMethod('post') && $this->getForm()->isValid()){
        $this->onSuccess();
        return true;
    }
    return false;
}

protected function onSuccess()
{
    $this->getEm()->persist($this->getForm()->getData()); 
}

public function createView()
{
    return $this->getForm()->createView();
}

protected function getEm()
{
    return $this->em;
}

protected function getForm()
{
    return $this->form;
}

protected function getRequest()
{
    return $this->request;
}

protected function setEm($em)
{
    $this->em = $em;
    return $this;
}

protected function setForm($form)
{
    $this->form = $form;
    return $this;
}

protected function setRequest($request)
{
    $this->request = $request;
    return $this;
}





}
