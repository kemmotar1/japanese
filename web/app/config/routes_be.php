<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class AdminRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths(
            [
                'module' => 'backend'
            ]    
        );
        
        $this->setPrefix('/admin');
        
        $this->addGet('[/]{0,1}',[
            'controller' => 'auth',
            'action' => 'index'
        ]);
        
        $this->addPost('[/]{0,1}',[
            'controller' => 'auth',
            'action' => 'login'
        ]);        
    }
}
