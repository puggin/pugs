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
	 * List of class aliases
	 *
	 * @var array
	 */
	private $aliases = [];

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
	 * Set an alias for the class
	 *
	 * @param string $alias
	 * @param string $className
	 *
	 * @return $this
	 */
	public function setAlias($alias = null, $className = null)
	{
		$alias = is_null($alias) ? $this->getAlias() : $alias;
		$className = is_null($className) ? get_class() : $className;

		$this->aliases[$alias] = $className;

		return $this;
	}

	/**
	 * Get the alias of the class
	 *
	 * @param string $alias
	 *
	 * @return string
	 */
	public function getAlias($alias)
	{
		return $this->alias;
	}

	/**
	 * @inheritdocs
	 */
	public function get($name)
	{
		return $this->core->container->get($name);
	}

	/**
	 * @inheritdocs
	 *
	 * @return $this
	 */
	public function set($name, $object)
	{
		$this->core->container->set($name, $object);

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