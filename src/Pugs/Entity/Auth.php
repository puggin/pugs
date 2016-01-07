<?php

namespace Pugs\Entity;

final class Auth extends \Pugs\Application\Model
{
	protected $fillable = [
		'token', 'expires_at'
	];

}