<?php

namespace Api;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Events\Manager;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Register autoloader
     *
     * @param DiInterface $di
     * @return void
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            'Api\Controllers' => BASE_APP . '/Api/Controllers/',
            'Api\Models' => BASE_APP . '/Api/Models/',
            'Api\Repositories' => BASE_APP . '/Api/Repositories/',
            'Api\Services' => BASE_APP . '/Api/Services/',
        ]);

        $loader->register();
    }
    
    /**
     * Register services related to module
     *
     * @param DiInterface $di
     * @return void
     */
    public function registerServices(DiInterface $di)
    {
        $di->set('dispatcher', function () {
            $dispatcher = new Dispatcher();
            $eventManager = new Manager();

            $dispatcher->setEventsManager($eventManager);
            $dispatcher->setDefaultNamespace('Api\Controllers\\');

            return $dispatcher;
        });

        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir(BASE_APP . '/Api/Views/');
            return $view;
        });
    }
}