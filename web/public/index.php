<?php
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application;

/**
 * Define some useful constants
 */

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try{
    
    /**
     * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
     */
    $di = new FactoryDefault();
    
    /**
     * Read services
     */
    require_once APP_PATH . '/config/services.php';
    
    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();
    
    /**
     * Include Autoloader
     */
    require_once APP_PATH . '/config/loader.php';
    
    /**
     * Handle the request
     */
    $application = new Application($di);
    
    $application->registerModules(
        [
            'frontend' => [
                'className' => 'Japanese\Frontend\Module',
                'path'      => APP_PATH . '/frontend/Module.php'
            ],
            'backend' => [
                'className' => 'Japanese\Backend\Module',
                'path'      => APP_PATH . '/backend/Module.php'
            ]
        ]
    );
    
    $application->handle()->send();
    
} catch (Exception $e) {
    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));
}

?>