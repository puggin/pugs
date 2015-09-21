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

	abstract public function register();

	/**
	 * Checks if the current service provider has an alias
	 *
	 * @return boolean
	 */
	public function hasAlias()
	{
		if ( empty($this->alias) ) {
			return false;
		}

		return true;
	}

	/**
	 * Gets the alias of the service provider
	 *
	 * @return string|null
	 */
	public function getAlias()
	{
		if ( empty($this->alias) ) {
			return null;
		}

		return $this->alias;
	}

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