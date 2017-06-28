<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerDirs([
	$config->app->controllerDir,
	$config->app->modelsDir,
	$config->app->repositoriesDir,	
	$config->app->servicesDir,
	$config->app->commandsDir
]);

$loader->registerNamespaces([
	"App" => BASE_APP,
	"App\\Controllers" => $config->app->controllerDir,
	"App\\Models" => $config->app->modelsDir,
	"App\\Repositories" => $config->app->repositoriesDir,
	"App\\Services" => $config->app->servicesDir,
	"App\\Commands" => $config->app->commandsDir,
]);

$loader->register();
