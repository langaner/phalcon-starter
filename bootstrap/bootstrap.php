<?php

use Phalcon\Mvc\Application;

/**
 * 	Creation Application class,
 */
$container = require_once __DIR__ . '/environment.php';


$application = new Application($container);

$application->useImplicitView(false);

/** 
 * Register modules
 */
$mods = $container->get('modules');

$application->registerModules($mods);

return $application;
