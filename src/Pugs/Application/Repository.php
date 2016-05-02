<?php

namespace Pugs\Application;

abstract class Repository
{

	/**
	 * Entity container
	 *
	 * @var Object
	 */
	protected $entity;

	/**
	 * Sets the current entity
	 *
	 * @param Object $entity
	 * @return void
	 */
	public function setEntity($entity)
	{
		$this->entity = $entity;
	}

	/**
	 * Returns the current configured entity
	 *
	 * @return $entity
	 */
	public function getEntity()
	{
		return $this->entity;
	}

	/**
	 * Finds an entity by its ID
	 *
	 * @param string $id
	 * @return Object $entity
	 */
	public function find($id)
	{
		return $this->entity->find($id);
	}

	/**
	 * Finds the first entity by the given parameters
	 *
	 * @param integer|array|string $param
	 * @return Object $entity
	 */
	public function first($params, $value = null)
	{
		if ( is_numeric($params) ) {
			$entity = $this->entity->find($id);
		}

		if ( is_array($params) ) {
			$entity = $this->entity->where($params)->first();
		}

		if ( is_string($params) ) {
			$entity = $this->entity->where($params, $value)->first();
		}

		return $entity;
	}

	/**
	 * Gets an entity by parameters
	 *
	 * @param array $params
	 * @return array
	 */
	public function get(array $params)
	{
		return $this->entity->where($params)->get();
	}

	/**
	 * Creates a new model
	 *
	 * @param array $data
	 * @return Object $entity
	 */
	public function create(array $data)
	{
		$this->entity = $this->map($data, (new $this->entity))->save();

		return $this->entity;
	}

	/**
	 * Updates the entity
	 *
	 * @param array $data
	 * @param integer|array $identifier
	 * @return Object $entity
	 */
	public function update(array $data, $identifier)
	{
		$this->entity = $this->entity->first($identifier);
		$this->entity = $this->map($data)->save();

		return $this->entity;
	}

	/**
	 * Deletes the entity
	 *
	 * @param integer|array $identifier
	 * @return boolean
	 */
	public function delete($identifier)
	{
		$entity = $this->entity->first($identifier);

		if ( is_null($entity) ) {
			return false;
		}

		$entity->delete();

		return true;
	}

	/**
	 * Mass assignment based on fillable, hidden, and guarded attributes
	 *
	 * @param array $inserts
	 * @throws \Pugs\Exception\EntityNotDefined
	 * @return object
	 */
	protected function map(array $inserts, $entity = null)
	{
		$this->entity = ! is_null($entity) ? $entity : $this->entity;

		if ( ! is_object($this->entity) ) {
			throw new \Pugs\Exception\EntityNotDefined;
		}

		$fields = array_unique(
			array_merge($this->entity->getFillable(), $this->entity->getHidden(), $this->entity->getGuarded())
		);

		foreach($inserts as $key => $val)
		{
			if ( in_array($key, $fields) ) {
				$this->entity->{$key} = $val;
			}
		}

		return $this->entity;
	}

}