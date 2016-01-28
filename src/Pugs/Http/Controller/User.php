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
	 * @param \Pugs\Repository\User $user
	 */
	public function __construct(
		\Pugs\Repository\User $user
	) {
		$this->user = $user;
	}
}