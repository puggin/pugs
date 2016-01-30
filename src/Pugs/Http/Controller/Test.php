<?php

namespace Pugs\Http\Controller;

use League\Route\Http\JsonResponse\Ok;

class Test extends \Pugs\Application\Controller
{

	public function getIndex()
	{
		return new Ok($this->getRequest()->headers->all());
	}

}