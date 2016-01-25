<?php

namespace Pugs\Repository;

class StreamComment extends \Pugs\Application\Repository
{

	/**
	 * User entity container
	 *
	 * @var \Pugs\Entity\StreamComment
	 */
	protected $comment;

	/**
	 * Class constructor
	 *
	 * @param \Pugs\Entity\StreamComment
	 */
	public function __construct(\Pugs\Entity\StreamComment $comment)
	{
		$this->comment = $comment;
	}
	
}