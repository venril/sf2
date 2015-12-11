<?php

namespace AstonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SessionController  extends Controller{
    public function writeSessAction()
    {
        $session = $this->get('session');
        // $session->set(key,value);
        $session->set('prenom','toto');
        $fb = $session->getFlashBag();
        
        $fb->add('success','victory !!');
        $fb->add('success','quel talent !!');
        $fb->add('info','info b');
        $fb->add('danger','Un truc s"est mal passé bro' );
        $fb->add('danger','You loose !!!' );
        $fb->add('success','ca marche !!');
        return $this->redirect($this->generateUrl('aston_dasboard'));
        
        // var_dump($fb->all());exit;
        //return new Response("Session Write");
    }
    public function readSessAction()
    {
        $session = $this->get('session');
        $prenom = $session->get('prenom');
        return new Response("Session Read : " . $prenom);
    }
    public function tplAction()
    {
        $data['users'] = array (
            'prenom' => 'toto',
            'nom'    => 'otot',
            'age'    => 'zero',
        );
        return $this->render('AstonBundle:Session:sess.html.twig',$data);
    }
    
}
