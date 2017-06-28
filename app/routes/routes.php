<?php 

use \Phalcon\Mvc\Router;

$router = new Router(false);

$router->addGet('/', 'Home::show');

return $router;
