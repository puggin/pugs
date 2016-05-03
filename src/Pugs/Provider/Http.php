<?php

namespace Pugs\Provider;

class Http extends \Pugs\Application\Provider
{

	/**
	 * The route class to be used by the application
	 *
	 * @var string
	 */
	protected $routeClass = 'Phroute\Phroute\RouteCollector';

	/**
	 * Dependencies to be used
	 *
	 * @var array
	 */
	protected $requires = [
		'Pugs\Application\Config'
	];

	public function register()
	{
		$this->set($this->routeClass, \DI\object($this->routeClass));

		$this->set('Symfony\Component\HttpFoundation\Request', \DI\Factory( function () {
			return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
		}));

		$this->registerRoutes();
	}

	protected function registerRoutes()
	{
		$router = $this->get($this->routeClass);
		$config = $this->get('Pugs\Application\Config');

		foreach( glob($config->get('paths.routes') . '/*.php' ) as $path ) {
			require $path;
		}
	}

}