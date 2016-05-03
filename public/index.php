<?php

$server = require_once dirname(dirname(__FILE__)) . '/server.php';
$router = $server->get('Phroute\Phroute\RouteCollector');
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$response->send();