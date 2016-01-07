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

	public function __construct($instace = null)
	{
		$this->instace = is_null($instace) ? new RouteCollection : $instace;
	}

	public function get($uri, $action)
	{
		$this->instace->get($uri, $action);
	}

	public function post($uri, $action)
	{
		$this->instace->post($uri, $action);
	}

	public function put($uri, $action)
	{
		$this->instace->put($uri, $action);
	}

	public function delete($uri, $action)
	{
		$this->instace->delete($uri, $action);
	}

	public function patch($uri, $action)
	{
		$this->instace->delete($uri, $action);
	}

}