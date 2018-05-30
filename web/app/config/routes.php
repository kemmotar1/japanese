<?php
/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router();

$router->setDefaultModule('frontend');

$admin = new Phalcon\Mvc\Router\Group(
    [
        'module' => 'backend'
    ]    
);
$admin->setPrefix('/admin');

$admin->addGet('[/]{0,1}',[
    'controller' => 'auth',
    'action' => 'index'
]);

$admin->addPost('[/]{0,1}',[
    'controller' => 'auth',
    'action' => 'login'
]);

$router->mount($admin);

/*$router->add('/confirm/{code}/{email}', [
    'controller' => 'user_control',
    'action' => 'confirmEmail'
]);
$router->add('/reset-password/{code}/{email}', [
    'controller' => 'user_control',
    'action' => 'resetPassword'
]); */

return $router;