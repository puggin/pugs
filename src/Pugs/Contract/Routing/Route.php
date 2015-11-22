<?php

namespace Pugs\Contract\Routing;

interface Route
{

	/**
	 * Routing collection instance container
	 *
	 * @var Obj
	 */
	protected $instance;

	/**
	 * Register a new GET route with the router.
	 *
	 * @param  string  $uri
	 * @param  \Closure|array|string  $action
	 * @return void
	 */
	public function get($uri, $action);

	/**
	 * Register a new POST route with the router.
	 *
	 * @param  string  $uri
	 * @param  \Closure|array|string  $action
	 * @return void
	 */
	public function post($uri, $action);

	/**
	 * Register a new PUT route with the router.
	 *
	 * @param  string  $uri
	 * @param  \Closure|array|string  $action
	 * @return void
	 */
	public function put($uri, $action);

	/**
	 * Register a new DELETE route with the router.
	 *
	 * @param  string  $uri
	 * @param  \Closure|array|string  $action
	 * @return void
	 */
	public function delete($uri, $action);

	/**
	 * Register a new PATCH route with the router.
	 *
	 * @param  string  $uri
	 * @param  \Closure|array|string  $action
	 * @return void
	 */
	public function patch($uri, $action);

	/**
	 * Register a new OPTIONS route with the router.
	 *
	 * @param  string  $uri
	 * @param  \Closure|array|string  $action
	 * @return void
	 */
	public function options($uri, $action);

}
