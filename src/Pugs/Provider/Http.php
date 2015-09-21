<?php

namespace Pugs\Provider;

use Pugs\Application\Provider;

class Http extends Provider
{

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
		$this->core->set('League\Route\RouteCollection', \DI\object('League\Route\RouteCollection')
			->method('setStrategy', \DI\object('Pugs\Application\Strategy\Puggr')->constructor($this->core))
		);

		$this->core->set('Symfony\Component\HttpFoundation\Request', \DI\Factory(function ( ){
			return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
		}));

		$this->registerRoutes();
	}

	protected function registerRoutes()
	{
		$router = $this->core->get('League\Route\RouteCollection');
		$config = $this->core->get('Pugs\Application\Config');

		foreach( glob($config->get('paths.routes') . '/*.php' ) as $path ) {
			require $path;
		}
	}

}