<?php

namespace Pugs\Application\Adapter;

class Route implements \Pugs\Application\Contract\Route
{

	protected $interface;

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