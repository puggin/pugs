<?php

namespace Pugs\Http\Controller;

use League\Route\Http\JsonResponse\Ok;
use League\Route\Http\JsonResponse\Created;

class Product extends \Pugs\Application\Controller {

	/**
	 * Controller middleware
	 *
	 * @var array
	 */
	protected $middleware = [
		'Pugs\Http\Middleware\AuthBearer',
	];

	/**
	 * Product repository container
	 *
	 * @var Pugs\Repository\Product
	 */
	protected $product;

	/**
	 * Class constructor
	 *
	 * @param Repository $product
	 */
	public function __construct(\Pugs\Repository\Product $product)
	{
		$this->product = $product;
	}

	/**
	 * Gets a certain product
	 *
	 * @return JsonResponse\Ok extend Response
	 */
	public function getProduct()
	{
		$request = $this->getRequest();

		$product = $this->product->getProduct(['name' => $request->get('name')]);
		
		return new Ok($product);
	}

	/**
	 * Gets all products
	 *
	 * @return JsonResponse\Ok extend Response
	 */
	public function getProducts()
	{
		$request = $this->getRequest();

		$products = $this->product->getProducts();

		return new Ok($products->toArray());
	}

	/**
	 * Creates a product
	 *
	 * @return JsonResponse\Ok extend Response
	 */
	public function postProduct()
	{
		$request = $this->getRequest();

		$data = [
			'name' => $request->get('name')
		];

		$product = $this->product->createProduct($data);

		return new Created($product->toArray());
	}

	/**
	 * Updates a certain product
	 *
	 * @return JsonResponse\Ok extend Response
	 */
	public function putProduct()
	{
		$request = $this->getRequest();

		$data = [
			'name' => $request->get('name')
		];

		$product = $this->product->updateProduct($request->get('id'), $data);

		return new Ok($product->toArray());
	}

	/**
	 * Delete a certain product
	 *
	 * @return JsonResponse\Ok extend Response
	 */
	public function deleteProduct()
	{
		$request = $this->getRequest();

		$product = $this->product->deleteProduct($request->get('id'));

		return new Ok([
			'deleted' => $product
		]);
	}

}