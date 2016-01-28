<?php

namespace Pugs\Http\Controller;

use League\Route\Http\JsonResponse\Ok;

class Auth extends \Pugs\Application\Controller {

	/**
	 * Auth repository container
	 *
	 * @var \Pugs\Repository\Auth
	 */
	protected $auth;

	public function __construct(\Pugs\Repository\Auth $auth)
	{
		$this->auth = $auth;
	}

	public function getAuth()
	{
		return new Ok([
			'token' => $this->auth->createToken()
		]);
	}

}
