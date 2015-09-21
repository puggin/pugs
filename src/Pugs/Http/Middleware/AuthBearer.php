<?php

namespace Pugs\Http\Middleware;

use Pugs\Repository\Auth as Repository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use League\Route\Http\Exception\UnauthorizedException;

class AuthBearer implements HttpKernelInterface
{

	protected $auth;

	public function __construct(Repository $auth)
	{
		$this->auth = $auth;
	}

	public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
	{
		if ( ! $request->headers->has('Authorization') ) {
			$exception = new UnauthorizedException("No token provided.");

			$response = $exception->getJsonResponse();

			return $response;
		}

		if ( $request->headers->get('Authorization') === null ) {
			$exception = new UnauthorizedException("No authorization header sent.");

			$response = $exception->getJsonResponse();

			return $response;
		}

		$token = $this->auth->attempt(
			str_replace('Bearer ', '', $request->headers->get('Authorization'))
		);

		if ( get_class($token) !== 'stdClass' ) {
			$exception = new UnauthorizedException($token->getMessage());

			$response = $exception->getJsonResponse();

			return $response;
		}
	}

}