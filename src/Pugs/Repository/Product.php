<?php

namespace Pugs\Repository;

use Pugs\Application\Repository;

class Product extends Repository
{

	/**
	 * Product model container
	 *
	 * @var Product
	 */
	protected $product;

	/**
	 * Class constructor
	 *
	 * @param \Pugs\Entity\Product $product
	 */
	public function __construct(\Pugs\Entity\Product $product)
	{
		$this->product = $product;
	}

	/**
	 * Finds a certain Product by its ID
	 *
	 * @param integer $id
	 * @return Pugs\Entity\Product
	 */
	public function findProduct($id)
	{
		return $this->product->find($id);
	}

	/**
	 * Get a product by its ID or by Name
	 *
	 * @param integer|string $param
	 * @return array
	 */
	public function getProduct($param)
	{
		return is_numeric($param) ? 
			$this->product->where('id', $param)->first():
			$this->product->where('name', $param)->first();
	}

	/**
	 * Return all products
	 *
	 * @return array
	 */
	public function getProducts()
	{
		return $this->product->get();
	}

	/**
	 * Creates a Product model
	 *
	 * @param array $params
	 * @return Pugs\Entity\Product
	 */
	public function createProduct(array $params)
	{
		$product = $this->mapInserts((new $this->product), $params);

		$product->save();

		return $product;
	}

	/**
	 * Updates a Product model
	 *
	 * @param integer $id
	 * @param array $params
	 * @return Pugs\Entity\Product
	 */
	public function updateProduct($id, array $params)
	{
		$product = $this->findProduct($id);
		$product = $this->mapInserts($product, $params);

		$product->save();

		return $product;
	}

	/**
	 * Deletes a Product model
	 *
	 * @param integer $id
	 * @return boolean
	 */
	public function deleteProduct($id)
	{
		$product = $this->findProduct($id);

		return $product->delete();
	}

}