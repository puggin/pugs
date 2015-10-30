<?php

namespace Pugs\Provider;

use Pugs\Application\Provider;

class Config extends Provider {

	/**
	 * Paths container
	 *
	 * @var array
	 */
	protected $paths = [];

	/**
	 * Dotenv class
	 *
	 * @var string
	 */
	protected $envClass = 'Dotenv\Dotenv';

	/**
	 * Config class
	 *
	 * @var srtring
	 */
	protected $configClass = 'Pugs\Application\Config';

	public function register()
	{
		$this->setupPaths();

		$this->set($this->envClass, \DI\object($this->envClass)
			->constructor($this->paths['env_file_path'])
		);

		$this->set($this->configClass, \DI\object($this->configClass)
			->method('loadConfigurationFiles', $this->paths['config_path'], $this->getEnvironment())
		);
	}

	/**
	 * Initialize the paths.
	 *
	 */
	protected function setupPaths()
	{
		$this->paths['env_file_path'] = ROOT . '/';
		$this->paths['env_file'] = $this->paths['env_file_path'].'.env';
		$this->paths['config_path'] = ROOT . '/config';
	}

	/**
	 * Detect the environment. Defaults to `production`.
	 *
	 * @return string
	 */
	protected function getEnvironment()
	{
		$dotenv = $this->get('Dotenv\Dotenv');

		if (is_file($this->paths['env_file'])) {
		   $dotenv->load($this->paths['env_file_path']);
		}

		return getenv('ENVIRONMENT') ?: 'production';
	}
	
}