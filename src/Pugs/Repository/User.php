<?php

namespace Pugs\Repository;

class User extends \Pugs\Application\Repository
{

	/**
	 * User entity container
	 *
	 * @var \Pugs\Entity\User
	 */
	protected $user;

	/**
	 * Class constructor
	 *
	 * @param \Pugs\Entity\User
	 */
	public function __construct(\Pugs\Entity\User $user)
	{
		$this->user = $user;
	}
	
}