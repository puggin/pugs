<?php

namespace Pugs\Repository;

class Group extends \Pugs\Application\Repository
{

	/**
	 * Group entity container
	 *
	 * @var \Pugs\Entity\Group
	 */
	protected $group;

	/**
	 * Class constructor
	 *
	 * @param \Pugs\Entity\Group
	 */
	public function __construct(\Pugs\Entity\Group $group)
	{
		$this->group = $group;
	}
	
}