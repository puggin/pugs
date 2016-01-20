<?php

namespace Pugs\Application;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller {

	/**
	 * Current Request
	 *
	 * @Inject
	 * @var Request
	 */
	protected $request;

	/**
	 * Return response
	 *
	 * @Inject
	 * @var Response
	 */
	protected $response;

	/**
	 * The middleware registered on the controller
	 *
	 * @var array
	 */
	protected $middleware;

	/**
	 * Gets the middleware
	 *
	 * @return array
	 */
	public function getMiddleware()
	{
		return $this->middleware;
	}

	/**
	 * Gets the request object
	 *
	 * @return \Symfony\Component\HttpFoundation\Request
	 */
	public function getRequest()
	{
		return $this->request;
	}

	/**
	 * Gets the response object
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getResponse()
	{
		return $this->response;
	}
	
}