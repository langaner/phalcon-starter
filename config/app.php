<?php

/**
 * App config file
 */
return [
	'name' => 'Phalcon',
	'debug' => true,
	'url' => 'http://localhost/',
	'timezone' => 'UTC',
	'locale' => 'en',
	'fallbackLocale' => 'en',
	'controllerDir' => BASE_APP . '/Controllers/',
	'repositoriesDir' => BASE_APP . '/Repositories/',
	'servicesDir' => BASE_APP . '/Services/',
	'modelsDir' => BASE_APP . '/Models/',
	'viewsDir' => BASE_APP . '/Views/',
	'commandsDir' => BASE_APP . '/Commands/',
	'cacheDir' => BASE . '/storage/cache/',
	'logsDir' => BASE . '/storage/logs/',
];
