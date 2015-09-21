<?php

namespace Pugs\Support;

class Arr {

	/**
	 * Return the first element in an array passing a given truth test.
	 *
	 * @param  array  $array
	 * @param  callable  $callback
	 * @param  mixed  $default
	 * @return mixed
	 */
	public static function first($array, callable $callback, $default = null)
	{
		foreach ($array as $key => $value) {
			if (call_user_func($callback, $key, $value)) {
				return $value;
			}
		}
		return value($default);
	}

}