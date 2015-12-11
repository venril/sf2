<?php

namespace AstonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SessionController  extends Controller{
    public function writeSessAction()
    {
        $session = $this->get('session');
        
        
        return new Response("Session Write");
    }
    public function readSessAction()
    {
        return new Response("Session Read");
    }
    public function tplAction()
    {
        return new Response("Session Template");
    }
    
}
