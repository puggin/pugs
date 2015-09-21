<?php

$server = require_once dirname(dirname(__FILE__)) . '/server.php';

$request = $server->get('Symfony\Component\HttpFoundation\Request');
$router = $server->get('League\Route\RouteCollection');

$dispatcher = $router->getDispatcher();

$response = $dispatcher->dispatch(
	$request->getMethod(),
	$request->getPathInfo()
);

$response->send();