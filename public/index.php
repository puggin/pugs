<?php

$server = require_once dirname(dirname(__FILE__)) . '/server.php';

$request = $server->get('Symfony\Component\HttpFoundation\Request');
$router = $server->get('League\Route\RouteCollection');

$dispatcher = $router->getDispatcher();

try {
	$response = $dispatcher->dispatch(
		$request->getMethod(),
		$request->getPathInfo()
	);
} catch(\League\Route\Http\Exception\NotFoundException $e) {
	$response = $e->getJsonResponse();
}

$response->send();