<?php

namespace Pugs\Application;

use Pugs\Application\Provider;
use Pugs\Support\Arr;
use DI\ContainerBuilder;

class Core
{

	/**
	 * DI Container
	 *
	 * @var ContainerBuilder
	 */
	protected $container;

	/**
	 * List of base providers
	 *
	 * @var array
	 */
	protected $baseProviders = [
		'Pugs\Provider\Config',
		'Pugs\Provider\Database',
		'Pugs\Provider\Http',
	];

	/**
	 * The names of the loaded service providers.
	 *
	 * @var array
	 */
	protected $loadedProviders = [];

	/**
	 * All of the registered service providers.
	 *
	 * @var array
	 */
	protected $serviceProviders = [];

	protected $booted = false;

	/**
	 * Class constructor
	 *
	 */
	public function __construct()
	{
		$this->buildContainer();

		$this->loadBaseProviders();
	}

	/**
	 * Builds the container
	 *
	 */
	protected function buildContainer()
	{
		$builder = new ContainerBuilder;
		$builder->useAnnotations(true);

		$this->container = $builder->build();

		$this->set('Pugs\Application\Core', $this);
	}

	public function loadBaseProviders()
	{
		foreach($this->baseProviders as $provider) {
			$this->register($provider);
		}
	}

	public function call($name, $params)
	{
		return $this->container->call($name, $params);
	}

	public function get($name)
	{
		return $this->container->get($name);
	}

	/**
	 * Lazy loads the dependencies
	 *
	 * @param string $name
	 * @param DI\Definition\Helper\ObjectDefinitionHelper $object
	 */
	public function set($name, $object)
	{
		$this->container->set($name, $object);
	}
	

	/**
     * Register a service provider with the application.
     *
     * @param  \Pugs\Application\Provider|string  $provider
     * @param  array  $options
     * @param  bool   $force
     * @return \Pugs\Application\Provider
     */
	public function register($provider, $options = [], $force = false)
	{
		if ( $registered = $this->getProvider($provider) && ! $force ) {
			return $registered;
		}

		// If the given "provider" is a string, we will resolve it, passing in the
		// application instance automatically for the developer. This is simply
		// a more convenient way of specifying your service provider classes.
		if (is_string($provider)) {
			$provider = $this->resolveProviderClass($provider);
		}

		$provider->register();

		// Once we have registered the service we will iterate through the options
		// and set each of them on the application so they will be available on
		// the actual loading of the service objects and for developer usage.
		foreach ($options as $key => $value) {
			$this[$key] = $value;
		}

		$this->markAsRegistered($provider);

		// If the application has already booted, we will call this boot method on
		// the provider class so it has an opportunity to do its boot logic and
		// will be ready for any usage by the developer's application logics.
		if ($this->booted) {
			$this->bootProvider($provider);
		}
	}

	/**
	 * Get the registered service provider instance if it exists.
	 *
	 * @param  \Pug\Application\Provider|string  $provider
	 * @return \Pug\Application\Provider|null
	 */
	public function getProvider($provider)
	{
		$name = is_string($provider) ? $provider : get_class($provider);

		return Arr::first($this->serviceProviders, function ($key, $value) use ($name) {
			return $value instanceof $name;
		});
	}

	/**
	 * Resolve a service provider instance from the class name.
	 *
	 * @param  string  $provider
	 * @return \Pug\Application\Provider
	 */
	public function resolveProviderClass($provider)
	{
		return new $provider($this);
	}

	/**
	 * Mark the given provider as registered.
	 *
	 * @param \Pug\Application\Provider
	 * @return void
	 */
	protected function markAsRegistered($provider)
	{
		$class = get_class($provider);

		$this->serviceProviders[] = $provider;
		$this->loadedProviders[$class] = true;
	}


}