<?php

namespace Pugs\Adapter\LeagueAdapter;

class Provider
{

	public function register()
	{
		$this->core->set('Pugs\Support\Contract\Route', \DI\Object('League\Route\RouteCollection')
			->method('setStrategy', \DI\object('Pugs\Support\Strategy\Puggr')
				->constructor($this->core)
			)
		);

		$this->core->set('Symfony\Component\HttpFoundation\Request', \DI\Factory( function () {
			return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
		}));

		$this->registerRoutes();
	}

	protected function registerRoutes()
	{
		$router = $this->core->get('Pugs\Contract\Routing\Route');
		$config = $this->core->get('Pugs\Application\Config');

		foreach( glob($config->get('paths.routes') . '/*.php' ) as $path ) {
			require $path;
		}
	}

}