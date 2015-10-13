<?php

namespace Pugs\Application\Adapter;

use Pugs\Application\Contract\Route as Contract;
use League\Route\RouteCollection;

class LeagueRoute implements Contract
{

	protected $interface;

	public function __construct(RouteCollection $interface = null)
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

	public function options($uri, $action)
	{

	}

	public function match($methods, $uri, $action)
	{

	}

	public function resource($name, $controller, array $options = [])
	{

	}

	public function group(array $attributes, Closure $callback)
	{

	}

}