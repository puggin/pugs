<?php

namespace Pugs\Application;

use Pugs\Application\Core;

abstract class Provider
{

	/**
	 * Core application container
	 *
	 * @var Core
	 */
	protected $core;

	/**
	 * Alias for the service provider
	 *
	 * @var string
	 */
	protected $alias;

	/**
	 * Classes that are provided by the service
	 *
	 * @var array
	 */
	protected $provides = [];

	/**
	 * Class constructor
	 *
	 * @param Core $core
	 */
	public function __construct(Core $core)
	{
		$this->core = $core;
	}

	/**
	 * @inheritdocs
	 */
	public function get($name)
	{
		return $this->container->get($name);
	}

	/**
	 * @inheritdocs
	 */
	public function set($name, $object)
	{
		$this->container->set($name, $object);
	}

	abstract public function register();

	/**
	 * Return list an array of classes that are provided
	 *
	 * @return array
	 */
	public function getProvides()
	{
		return $this->provides;
	}

}