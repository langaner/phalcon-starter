<?php 

require_once __DIR__ . '/constant.php';
require_once BASE . '/vendor/autoload.php';

use Symfony\Component\Debug\Debug;

/**
 * Load config
 */
$config = require_once __DIR__ . '/setup.php';

/**
 * Class loader
 */
require_once __DIR__ . '/loader.php';

/**
 * Debugger
 */
if($config->app->debug == true) {
	Debug::enable();
}

/**
 * Sort any stated modules
 */
$phalconModule = [];
$routeGroups = [];

foreach($config->module->modules as $name => $module) {
	$path = __DIR__ . $module->path;
	$phalconModule[$name] = ['className' => $module->name, 'path' => $path . $config->module->folder. '/Module.php']; 
	
	if($module->useRoutes && file_exists($path . '/routes/routes.php')) {
		$routeGroups[] = require_once($path . '/routes/routes.php');
	}
}

/**
 * Load services
 */
require_once __DIR__ . '/services.php';

return $container;
