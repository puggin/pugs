<?php

namespace Pugs\Http\Middleware;

use Symfony\Component\HttpFoundation\Request;  
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Test implements HttpKernelInterface
{
	public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
	{
		
	}
}