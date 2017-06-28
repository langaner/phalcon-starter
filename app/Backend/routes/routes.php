<?php 

use \Phalcon\Mvc\Router\Group;

$api = new Group([
    'module' => 'backend',
    'controller' => 'User'
]);

$api->setPrefix('/backend');

$api->addGet('/test', [
    'action' => 'test'
]);

return $api;