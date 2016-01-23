<?php

namespace Pugs\Entity;

final class UserGroup extends \Pugs\Application\Model
{
	/**
	 * Retrieve User information
	 *
	 * @return \Pugs\Entity\User
	 */
	public function user()
	{
		return $this->belongsTo('Pugs\Entity\User');
	}

	/**
	 * Retrieve Group information
	 *
	 * @return \Pugs\Entity\Group
	 */
	public function group()
	{
		return $this->belongsTo('Pugs\Entity\Group');
	}
}