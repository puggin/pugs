<?php

namespace Pugs\Http\Controller;

class User extends \Pugs\Application\Controller
{
	/**
	 * User repository container
	 *
	 * @var \Pugs\Repository\User
	 */
	protected $user;
	
	/**
	 * Controller middleware
	 *
	 * @var array
	 */
	protected $middleware = [
		'Pugs\Http\Middleware\AuthBearer',
	];

	/**
	 * Class constructor
	 *
	 */
	public function __construct()
	{

	}
}