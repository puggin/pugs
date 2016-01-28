<?php

namespace Pugs\Http\Controller;

use Pugs\Repository\Auth as Repository;
use League\Route\Http\JsonResponse\Ok;

class Auth extends \Pugs\Application\Controller {

	protected $auth;

	public function __construct(Repository $auth)
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
