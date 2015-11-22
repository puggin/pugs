<?php

namespace Pugs\LeagueAdapter;

use League\Route\RouteCollection;

class Adapter implements \Pugs\Contract\Routing\Route
{

	/**
	 * Routing collection instance container
	 *
	 * @var \League\Route\RouteCollection
	 */
	protected $instance;

	public function __construct($interface = null)
	{
		$this->interface = is_null($interface) ? new RouteCollection : $interface;
	}

	public function get($uri, $action)
	{
		$this->interface->get($uri, $action);
	}

	public function post($uri, $action)
	{
		$this->interface->post($uri, $action);
	}

	public function put($uri, $action)
	{
		$this->interface->put($uri, $action);
	}

	public function delete($uri, $action)
	{
		$this->interface->delete($uri, $action);
	}

	public function patch($uri, $action)
	{
		$this->interface->delete($uri, $action);
	}

}