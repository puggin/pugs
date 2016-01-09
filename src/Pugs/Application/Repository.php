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
	 * @param integer|array $param
	 * @return Object $entity
	 */
	public function first($params)
	{
		if ( is_numeric($params) ) {
			$entity = $this->find($id);
		}

		if ( is_array($params) ) {
			$entity = $this->where($params)->first();
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
		$entity = $this->mapInserts((new $this->entity), $data);
		$entity->save();

		return $entity;
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
		$entity = $this->first($identifier);
		$entity = $this->mapInserts($model, $data);

		$entity->save();

		return $entity;
	}

	/**
	 * Deletes the entity
	 *
	 * @param integer|array $identifier
	 * @return boolean
	 */
	public function delete($identifier)
	{
		$entity = $this->first($identifier);

		if ( is_null($entity) ) {
			return false;
		}

		$entity->delete();

		return true;
	}

	/**
	 * Mass assignment based on fillable, hidden, and guarded attributes
	 *
	 * @param object $model
	 * @param array $insertArray
	 * @return object
	 */
	protected function mapInserts($model, $insertArray)
	{
		$fields = array_unique(
			array_merge($model->getFillable(), $model->getHidden(), $model->getGuarded())
		);

		foreach($insertArray as $key => $val)
		{
			if ( in_array($key, $fields) ) {
				$model->{$key} = $val;
			}
		}

		return $model;
	}

}