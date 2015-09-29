<?php

namespace Pugs\Application\Http;

use Pugs\Application\Core;
use League\Route\RouteCollection;

class Kernel
{

	protected $core;

	protected $route;

	protected $middleware;

	public function __construct(Core $core, RouteCollection $route)
	{
		$this->core = $core;
		$this->route = $route;

		// run the request through every middleware
	}

	// function for gathering middleware for a specific route/request
}