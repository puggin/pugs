<?php

namespace Pugs\Http\Controller;

use Pugs\Application\Controller;
use League\Route\Http\JsonResponse\Ok;

class Test extends Controller
{
	protected $middleware = [
		'Pugs\Http\Middleware\AuthBearer',
	];

	public function getIndex()
	{
		return new Ok($this->getRequest()->headers->all());
	}
}