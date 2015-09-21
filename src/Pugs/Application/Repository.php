<?php

namespace Pugs\Application;

abstract class Repository
{

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