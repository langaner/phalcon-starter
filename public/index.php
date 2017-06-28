<?php 

$application = require_once dirname(__DIR__) . '/bootstrap/bootstrap.php';

/**
 * Handle routes
 */
echo $application->handle()->getContent();
