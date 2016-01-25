<?php

namespace Pugs\Repository;

class UserGroup extends \Pugs\Application\Repository
{

	/**
	 * User entity container
	 *
	 * @var \Pugs\Entity\UserGroup
	 */
	protected $usergroup;

	/**
	 * Class constructor
	 *
	 * @param \Pugs\Entity\UserGroup
	 */
	public function __construct(\Pugs\Entity\UserGroup $usergroup)
	{
		$this->usergroup = $usergroup;
	}
	
}