<?php

namespace Pugs\Application;

use Pugs\Application\Core;

abstract class Provider
{

	/**
	 * Core application container
	 *
	 * @var \Pugs\Application\Core
	 */
	protected $core;

	/**
	 * Classes that are provided by the service
	 *
	 * @var array
	 */
	protected $provides = [];

	/**
	 * Class constructor
	 *
	 * @param \Pugs\Application\Core $core
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
		return $this->core->get($name);
	}

	/**
	 * @inheritdocs
	 *
	 * @return $this
	 */
	public function set($name, $object)
	{
		$this->core->set($name, $object);

		return $this;
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