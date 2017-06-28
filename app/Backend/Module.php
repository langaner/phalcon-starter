<?php

namespace Backend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Events\Manager;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\ModuleDefinitionInterface;
use App\ModulesProvider;

class Module extends ModulesProvider implements ModuleDefinitionInterface
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
            'Backend\Controllers' => BASE_APP . '/Backend/Controllers/',
            'Backend\Models' => BASE_APP . '/Backend/Models/',
            'Backend\Repositories' => BASE_APP . '/Backend/Repositories/',
            'Backend\Services' => BASE_APP . '/Backend/Services/',
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
        parent::registerServices($di);

        $di->set('dispatcher', function () {
            $dispatcher = new Dispatcher();
            $eventManager = new Manager();

            $dispatcher->setEventsManager($eventManager);
            $dispatcher->setDefaultNamespace('Backend\Controllers\\');

            return $dispatcher;
        });

        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir(BASE_APP . '/Backend/Views/');

            return $view;
        });

        // $di->getService('dispatcher')->setDefaultNamespace('Backend\Controllers\\');
        // $di->getService('view')->setViewsDir(BASE_APP . '/Backend/Views/');
    }
}