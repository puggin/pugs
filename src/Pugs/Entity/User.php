<?php

namespace Pugs\Entity;

final class User extends \Pugs\Application\Model
{
	protected $fillable = [
		'username', 'nickname', 'first_name', 'last_name', 'email'
	];

	protected $guarded = [
		'password'
	];

	/**
	 * Retrieve all user groups 
	 *
	 * @return \Pugs\Entity\UserGroup
	 */
	public function groups()
	{
		return $this->hasMany('Pugs\Entity\UserGroup');
	}
}