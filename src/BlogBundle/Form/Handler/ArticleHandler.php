<?php

namespace BlogBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;


class ArticleHandler {
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

public function __construct(Form $form, Request $request, EntityManager $em)
{
    $this->setEm($em);
    $this->setForm($form);
    $this->setRequest($request);
}

public function process()
{
    
}

public function onSuccess()
{
    $this->getEm()->persist($this->getForm()->getData());
}


public function getEm()
{
    return $this->em;
}

public function getForm()
{
    return $this->form;
}

public function getRequest()
{
    return $this->request;
}

public function setEm($em)
{
    $this->em = $em;
    return $this;
}

public function setForm($form)
{
    $this->form = $form;
    return $this;
}

public function setRequest($request)
{
    $this->request = $request;
    return $this;
}


}
