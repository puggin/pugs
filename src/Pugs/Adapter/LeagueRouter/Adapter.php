<?php

namespace Pugs\Adapter\LeagueAdapter;

use League\Route\RouteCollection;

class Adapter implements \Pugs\Contract\Routing\Route
{

	/**
	 * Routing collection instance container
	 *
	 * @var \League\Route\RouteCollection
	 */
	protected $instance;

	public function __construct($instance = null)
	{
		$this->instance = is_null($instance) ? new RouteCollection : $instance;
	}

	public function get($uri, $action)
	{
		$this->instance->get($uri, $action);
	}

	public function post($uri, $action)
	{
		$this->instance->post($uri, $action);
	}

	public function put($uri, $action)
	{
		$this->instance->put($uri, $action);
	}

	public function delete($uri, $action)
	{
		$this->instance->delete($uri, $action);
	}

	public function patch($uri, $action)
	{
		$this->instance->delete($uri, $action);
	}

}