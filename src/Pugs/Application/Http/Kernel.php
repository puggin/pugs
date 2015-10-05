<?php

namespace Pugs\Application\Http;

use Pugs\Application\Core;
use League\Route\RouteCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel
{

	/**
	 * Core container
	 *
	 * @var Pugs\Application\Core
	 */
	protected $core;

	/**
	 * League routing container
	 *
	 * @var League\Route\RouteCollection
	 */
	protected $route;

	/**
	 * Route middleware
	 *
	 * @var array
	 */
	protected $middleware;

	public function __construct(Core $core, RouteCollection $route)
	{
		$this->core = $core;
		$this->route = $route;

		foreach ( $this->middleware as $key => $middleware ) {
			
		}
	}

	/**
	 * Handles incoming HTTP requuest.
	 *
	 * @param \Symfony\Component\HttpFoundation\Request $request
	 * @return \Symfony\Component\HttpFoundation\Response $response
	 */
	public function handle(Request $request)
	{
		
	}

	/**
     * Call the terminate method on any terminable middleware.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return void
     */
	public function terminate(Request $request, Response $response)
	{

	}
}