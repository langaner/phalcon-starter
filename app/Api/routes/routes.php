<?php 

use \Phalcon\Mvc\Router\Group;

$api = new Group([
    'module' => 'api',
    'controller' => 'User'
]);

$api->setPrefix('/api');

$api->add('/test', [
    'action' => 'test'
]);

return $api;