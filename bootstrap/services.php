<?php

use Phalcon\DI\FactoryDefault,
	Phalcon\DI,
    Phalcon\Mvc\Router,
	Phalcon\Mvc\View\Simple as View,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Mvc\Url as UrlResolver,
	Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
	Phalcon\Mvc\View\Engine\Volt as VoltEngine,
	Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter,
	Phalcon\Session\Adapter\Files as SessionAdapter,
	Symfony\Component\Debug\Debug;

/**
 * Create a new Factory default dependancy injector
 */
$container = new FactoryDefault;
DI::reset();

/**
 * Start the session
 */
$container->set('session', function() 
{
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

/**
 * Dispatcher
 */
$container->set('dispatcher', function() 
{
	$dispatcher = new Dispatcher;
	// $dispatcher->setModelBinding(true);
	$dispatcher->setDefaultNamespace("App\\Controllers");
	return $dispatcher;
});

/**
 * Models metadata
 */
$container->set('modelsMetadata', function() use ($config) 
{
	return new MetaDataAdapter();
});

/**
 * The database component
 */
$container->set('db', function() use ($config) 
{
	return new DbAdapter($config->database->connections[$config->database->default]);
});

/**
 * The Views component
 */
$container->set('view', function() use ($config) 
{
	$view = new View;

	$view->setViewsDir($config->app->viewsDir);

	$view->registerEngines([
		'.volt'	=> function($view, $container) use ($config) {
			$volt = new VoltEngine($view, $container);

			$volt->setOptions([
				'compiledPath'		=> $config->app->cacheDir,
				'compiledSeperator'	=> '_'
			]);

			return $volt;
		},
			'.phtml' => 'Phalcon\Mvc\View\Engine\Php'
		]);

	return $view;
}, true);

/**
 * Load modules
 */
$container->set('modules', function() use($phalconModule) 
{
	return $phalconModule;
});

/**
 * Load the routes into the container
 */
$container->set('router', function() use ($routeGroups)
{
	$routes = require_once BASE . '/app/routes/routes.php';

	foreach($routeGroups as $group)
	{
		$routes->mount($group);
	}

	return $routes;
}, true);

/**
 * Load the url resolver
 */
$container->set('url', function() use ($config) 
{
	$url = new UrlResolver;
	$url->setBaseUri($config->app->baseUrl);
	return $url;
}, true);

/**
 * Load config
 */
$container->set(
    'config',
    function () use($config) {
        return $config;
    }
);

/**
 * Load logger
 */
$container->set("logger", function () use ($config, $container)
{
	$router = $container->get('router');
	$controller = $router->getControllerName();
	$action = $router->getActionName();
	$logger = new FileAdapter($config->app->logsPath);
	$formatter = new LineFormatter("[%date%][Controller: ".$controller."->Action: ".$action."][%type%]{%message%}");
	$logger->setFormatter($formatter);
	return $logger;
});

DI::setDefault($container);

return $container;