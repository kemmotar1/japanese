<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class WebRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths(
            [
                'module' => 'frontend'
            ]    
        );
        
        $this->addGet("/",
            [
                'controller' => 'index',
                'action'    => 'index'
            ]    
        );
    }
}