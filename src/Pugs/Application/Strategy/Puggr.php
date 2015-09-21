<?php

namespace Pugs\Application\Strategy;

use Pugs\Application\Core;
use League\Route\Strategy\StrategyInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Capsule\Manager as Capsule;
use Pugs\Entity\Product;

class Puggr implements StrategyInterface
{
	/**
	 * Core class container
	 *
	 * @var Pugs\Application\Core
	 */
	protected $core;

	/**
	 * Preset Response
	 *
	 * @var Response
	 */
	protected $response;

	/**
	 * Controller class container
	 *
	 * @var Pug\Http\Controller\{name}
	 */
	protected $controller;

	/**
	 * Controller prefix, to be added by a name later
	 *
	 * @var string
	 */
	protected $controllerName = 'Pugs\Http\Controller\\';

	/**
	 * Controller method to be executed
	 *
	 * @var string
	 */
	protected $controllerMethod;

	/**
	 * Class constructor
	 *
	 * @param Core $core
	 */
	public function __construct(Core $core)
	{
		$this->core = $core;
	}

	/**
     * Dispatch the controller, the return value of this method will bubble out and be
     * returned by \League\Route\Dispatcher::dispatch, it does not require a response, however,
     * beware that there is no output buffering by default in the router
     *
     * $controller can be one of three types but based on the type you can infer what the
     * controller actually is:
     *     - string   (controller is a named function)
     *     - array    (controller is a class method [0 => ClassName, 1 => MethodName])
     *     - \Closure (controller is an anonymous function)
     *
     * -- Developer's Note --
     * For now we're only incorpirating the array method
     *
     * @param  string|array|\Closure $controller
     * @param  array                 $vars - named wildcard segments of the matched route
     * @return mixed
     */
	public function dispatch($controller, array $vars)
	{
		return $this->setController($controller)
			->runMiddleware()
			->sendResponse();		
	}

	/**
	 * Sets the controller object
	 *
	 * @param array $controller [0 => ClassName, 1 => MethodName]
	 * @return $this
	 */
	protected function setController($controller)
	{
		$this->controllerName = $this->controllerName . $controller[0];
		$this->controllerMethod = $controller[1];

		$this->controller = $this->core->get($this->controllerName);

		return $this;
	}

	/**
	 * Gets the controller object
	 *
	 * @return Pugs\Htt\Controller\{ClassName}
	 */
	protected function getController()
	{
		return $this->controller;
	}

	/**
	 * A hackish way of running middleware, needs improvement though
	 *
	 * @return $this|Symfony\Component\HttpFoundation\Response
	 */
	protected function runMiddleware()
	{
		$controller = $this->getController();
		$middlewares = $controller->getMiddleware();
		$request = $controller->getRequest();

		if ( ! count($middlewares) > 0) {
			return $this;
		}

		foreach($middlewares as $middleware) {
			$response = $this->core->get($middleware)->handle($request);

			if ( ! empty($response) ) {
				return $this->setResponse($response);
			}
		}

		return $this;
	}

	/**
	 * Set the appropriate response
	 *
	 * @param Response $response
	 * @return $this
	 */
	public function setResponse($response)
	{
		$this->response = $response;

		return $this;
	}

	/**
	 * Send the response to the dispatcher
	 *
	 * @return Response
	 */
	public function sendResponse()
	{
		if ( is_object($this->response) ) {
			return $this->response;
		}

		return $this->getController()->{$this->controllerMethod}();
	}

}