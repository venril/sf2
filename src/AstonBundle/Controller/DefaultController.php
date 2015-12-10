<?php

namespace AstonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
      return $this->render('AstonBundle:Default:index.html.twig');
    }
    public function dashboardAction($stats)
    {
        if($stats === 0 ) {
            //return $this->forward('AstonBundle:Default:about');
        };
      return $this->render('AstonBundle:Default:dashboard.html.twig', array(
          'stats' => $stats,
      ));
    }
    public function aboutAction()
    {
      return $this->render('AstonBundle:Default:about.html.twig');
    }
}
