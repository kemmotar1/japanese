<?php

require_once 'routes_fe.php';
require_once 'routes_be.php';
/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router();

$router->setDefaultModule('frontend');

$router->mount(new AdminRoutes());

$router->mount(new WebRoutes());

return $router;