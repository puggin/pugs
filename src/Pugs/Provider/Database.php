<?php

namespace Pugs\Provider;

class Database extends \Pugs\Application\Provider {

	/**
	 * Dependencies to be used
	 *
	 * @var array
	 */
	protected $requires = [
		'Pugs\Application\Config'
	];

	/**
	 * Capsule Manager container
	 *
	 * @var Illuminate\Database\Capsule\Manager
	 */
	protected $database;

	public function register()
	{
		$this->buildDatabase();

		$this->boot();
	}

	protected function buildDatabase()
	{
		$config = $this->get('Pugs\Application\Config');
		$this->database = new \Illuminate\Database\Capsule\Manager;

		foreach($config->get('database.connections') as $key => $connection) {
			$connectionName = $config->get('database.default') === $key ? 'default' : $key;
			$this->database->addConnection($connection, $connectionName);
		}
	}

	protected function boot()
	{
		$this->database->setAsGlobal();
		
		$this->database->bootEloquent();
	}
	
}