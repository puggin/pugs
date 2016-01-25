<?php

namespace Pugs\Repository;

class Stream extends \Pugs\Application\Repository
{

	/**
	 * User entity container
	 *
	 * @var \Pugs\Entity\Stream
	 */
	protected $stream;

	/**
	 * Class constructor
	 *
	 * @param \Pugs\Entity\Stream
	 */
	public function __construct(\Pugs\Entity\Stream $stream)
	{
		$this->stream = $stream;
	}
	
}