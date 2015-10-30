<?php

namespace Pugs\Provider;

use Pugs\Application\Provider;

class Http extends Provider
{

	/**
	 * The route class to be used by the application
	 *
	 * @var string
	 */
	protected $routeClass = 'League\Route\RouteCollection';

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
		$this->set($this->routeClass, \DI\object($this->routeClass)
			->method('setStrategy', \DI\object('Pugs\Application\Strategy\Puggr')->constructor($this->core))
		);

		$this->set('Symfony\Component\HttpFoundation\Request', \DI\Factory( function () {
			return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
		}));

		$this->registerRoutes();
	}

	protected function registerRoutes()
	{
		$router = $this->get('League\Route\RouteCollection');
		$config = $this->get('Pugs\Application\Config');

		foreach( glob($config->get('paths.routes') . '/*.php' ) as $path ) {
			require $path;
		}
	}

}