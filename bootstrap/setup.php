<?php

use \Phalcon\Config;

/**
 * Load configuration files
 */
$database = require_once dirname(__DIR__) . '/config/database.php';
$app = require_once dirname(__DIR__) . '/config/app.php';
$cli = require_once dirname(__DIR__) . '/config/cli.php';
$module = require_once dirname(__DIR__) . '/config/module.php';
$mail = require_once dirname(__DIR__) . '/config/mail.php';
$file = require_once dirname(__DIR__) . '/config/file.php';
$cache = require_once dirname(__DIR__) . '/config/cache.php';

return new Config([
	'database' => $database,
	'app' => $app,
	'cli' => $cli,
	'module' => $module,
	'mail' => $mail,
	'file' => $file,
	'cache' => $cache
]);
