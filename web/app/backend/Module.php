<?php
namespace Japanese\Backend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;


class Module implements ModuleDefinitionInterface
{
    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $config = $di->getConfig();
        $loader = new Loader();
        
        $loader->registerNamespaces(
            [
                'Japanese\Backend\Models'      => $config->application->modelsDirBE,
                'Japanese\Backend\Controllers' => $config->application->controllersDirBE,                    
            ]
        );
        
        $loader->register();
    }
    
    /**
     * Register specific services for the module
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $config = $this->getConfig();
            $view = new View();
            $view->setViewsDir($config->application->viewsDirBE);
            $view->registerEngines([
                '.volt' => function ($view) {
                    $config = $this->getConfig();
                    $volt = new VoltEngine($view, $this);
                    $volt->setOptions([
                        'compiledPath' => $config->application->cacheDir . 'volt/',
                        'compiledSeparator' => '_'
                    ]);
                    return $volt;
                }
            ]);
            return $view;
        }, true);
        
        /**
         * Dispatcher use a default namespace
         */
        $di->set('dispatcher', function () {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('Japanese\Backend\Controllers');
            return $dispatcher;
        });
            
    }
}