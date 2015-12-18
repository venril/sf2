<?php
namespace BlogBundle\Service;
class Blog {
    private $title;
    
    public function __construct($title)
    {
        $this->title = (string) $title;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

        
    public function sayHello(){
        return "Hey, w up foo";
    }
}
