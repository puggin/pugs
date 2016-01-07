<?php

return [

	'default' => 'main',

	'connections' => [

		'main' => [
			'driver' => 'mysql',
			'host' => getenv('DB_HOSTNAME'),
			'database' => getenv('DB_DATABASE'),
			'username' => getenv('DB_USERNAME'),
			'password' => getenv('DB_PASSWORD'),
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => ''
		]

	],

];